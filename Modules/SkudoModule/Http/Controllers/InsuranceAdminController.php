<?php

namespace Modules\SkudoModule\Http\Controllers;

use App\Exports\InsuranceExport;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\SkudoModule\Notifications\InsuranceRepliedNotification;
use Modules\SkudoModule\Notifications\InsuranceReplyNotification;
use Modules\SkudoModule\Repository\InsuranceRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InsuranceAdminController extends Controller
{
    use ApiResponseHelper;
    use UploaderHelper;

    /** @var InsuranceRepository */
    private $insuranceRepository;
    /** @var ConfigRepository */
    private $configRepository;

    public function __construct(InsuranceRepository $insuranceRepository, ConfigRepository $configRepository)
    {
        // Granular permissions
        $this->middleware('permission:show_skudo_insurance')->only(['index', 'insuranceServer', 'showModal', 'export']);
        $this->middleware('permission:update_skudo_insurance')->only(['edit', 'update']);
        $this->middleware('permission:delete_skudo_insurance')->only(['destroy']);

        $this->insuranceRepository = $insuranceRepository;
        $this->configRepository = $configRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        // Mark all unseen insurances as seen
        $this->insuranceRepository->query()->whereNull('seen_at')->update(['seen_at' => now()]);

        $insurances = $this->insuranceRepository->query();

        if ($request->get('filter') == 'completed'){
            $insurances->where('status', '!=', 0)->get();
        }
        elseif ($request->get('filter') == 'new'){
            $insurances->where('status', 0)->get();
        }
        elseif ($request->get('filter') == 'in_progress'){
            $insurances->where('status', 3)->get();
        }

        if ($request->get('date'))
            $insurances->whereDate('created_at', $request->get('date'));


        return view('skudomodule::admin.insurance.index', compact('insurances'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $insurance = $this->insuranceRepository->query()->with('serialNumber')->where('id', $id)->first();
        return view('skudomodule::admin.insurance.edit', compact('insurance'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'status' => 'required|in:0,1,2,3',
            'reason' => 'required_if:status,2',
            'store_reason' => 'required_if:status,0',
        ]);

        if ($data['status'] == 1) {
            $data['expire_date'] = now()->addYears(intval($this->configRepository->getConfigsByKey(['insurance_years'])->first()->value_ar ?? 1));
        } else {
            $data['expire_date'] = null;
        }

        $data['admin_id'] = auth('admin')->id();

        $insurance = $this->insuranceRepository->first(['id' => $id]);

        if ($data['status'] == 1 || $data['status'] == 2) {
            if (is_null($insurance->replied_at)) $data['replied_at'] = now();
        } else {
            $data['replied_at'] = null;
        }

        if ($insurance->isClosed()) {
            return redirect()->back();
        }

        $insurances = $insurance->with(['admin', 'warranties'])->get();

        $this->insuranceRepository->newMarkSeen($insurances,$id);


        $insurance->update($data);

        if ($insurance->status == 1) {
            if ($insurance->merchant) {
                notify($insurance->merchant, new InsuranceRepliedNotification($insurance));
            }

            if ($insurance->user) {
                notify($insurance->user, new InsuranceRepliedNotification($insurance));
            }
        }

        if ($insurance->merchant) {
            notify($insurance->merchant, new InsuranceReplyNotification($insurance));
        }

        return redirect()->route('skudo.insurance.index')->with('updated', 'updated');
    }

    /**
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        return Excel::download(new InsuranceExport($this->insuranceRepository), 'Insurances.xlsx');
    }

    public function showModal($insurance)
    {
        $insurance = $this->insuranceRepository->query()
            ->with(['merchant', 'phone_code', 'admin'])
            ->find($insurance);
            
        if (!$insurance) {
            return response('<div class="alert alert-danger text-center">لم يتم العثور على بيانات التأمين</div>', 404);
        }
        
        return view('skudomodule::admin.insurance.insurance-fields', compact('insurance'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $warranty = $this->insuranceRepository->first(['id' => $id]);
        $warranty->delete();
        return redirect()->route('skudo.insurance.index')->with('updated', 'updated');
    }

    public function insuranceServer(Request $request)
    {

        $start=isset($request->iDisplayStart)?$request->iDisplayStart:1;
        $Length=isset($request->iDisplayLength)?$request->iDisplayLength:10;
        $sEcho=isset($request->sEcho)?$request->sEcho:1;
        $Search=isset($request->sSearch)?$request->sSearch:"";


        $sort = $request->iSortCol_0?$request->iSortCol_0:0;
        $type_sort = $request->sSortDir_0?$request->sSortDir_0:'desc';


        $arrOfSort=['id','id','id','user_name','phone','email','dummy_text_1','dummy_text_2','dummy_text_3','id','id','usage_date','created_at','replied_at','id','expire_date','id','id'];

        $insurances = $this->insuranceRepository->query();

        if ($request->get('filter') == 'completed'){
            $insurances->where('status',1)->get();
        }
        elseif ($request->get('filter') == 'new'){
            $insurances->where('status', 0)->get();
        }
        elseif ($request->get('filter') == 'in_progress'){
            $insurances->where('status', 3)->get();
        }
        if ($request->get('date'))
            $insurances->whereDate('created_at', $request->get('date'));

        if(!empty($Search))
        {
            $insurances->where(function ($qu) use ($Search){
                $qu->where('id',$Search)
                    ->orWhere('user_name','like','%'.$Search.'%')
                    ->orWhere('phone','like','%'.$Search.'%')
                    ->orWhere('email','like','%'.$Search.'%')
                    ->orWhere('dummy_text_1','like','%'.$Search.'%')
                    ->orWhere('dummy_text_2','like','%'.$Search.'%');
//                    ->orWhere('dummy_text_3','like','%'.$Search.'%');

            })->orWhere(function ($que) use ($Search){
                if($Search == __('skudomodule::insurance.activated')){
                    $que->where('status',1);
                }
                if($Search ==__('skudomodule::insurance.pending')){
                    $que->where('status',0);
                }
                if($Search == __('skudomodule::insurance.rejected')){
                    $que->where('status',2);
                }
                if($Search == __('skudomodule::insurance.closed')){
                    $que->where('expire_date','<',Carbon::now());
                }
            });



        }
        $insurancesCount = $insurances->with(['admin', 'warranties'])
            ->orderBy($arrOfSort[$sort],$type_sort)->get();

        $insurances = $insurancesCount->skip($start)->take($Length);

        $responce=[];
        foreach ($insurances as $insurance)
        {

            $id =  $insurance->id;
//            $merchant = $insurance->merchant->company_name ?? '';
//            $merchant_account = $insurance->merchant->account_number ?? '';
            $user_name = $insurance->user_name;
            $phone = $insurance->phone ? (($insurance->phone_code->code ?? '') . ' ' . $insurance->phone) : '';
//            $email = $insurance->email;
            $dummy_text_1= $insurance->dummy_text_1;
            $dummy_text_2 = $insurance->dummy_text_2;
//            $dummy_text_3 = $insurance->dummy_text_3;
            $att = addslashes($insurance->attachments_str);
            // invoice_image is already included in attachments_str (4th position) for Skudo insurance
            $inv = '';
            $attachments = '<ul class="table-controls">
                              <li><a href="javascript: void(0)" onclick="showAttachments(\''.$att.'\', \''.$inv.'\')"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="Shot">
                                                            <i class="flaticon-view-1 bg-info p-1 text-white"></i>
                                                        </a>
                                                    </li>
                                                </ul>';
            $usage_date = $insurance->usage_date ? $insurance->usage_date->toDateString() . '<br>' . $insurance->usage_date->diffForHumans() : '';
            $created_at = $insurance->created_at ? $insurance->created_at . '<br>' . $insurance->created_at->diffForHumans() : '';
            $replied_at =  $insurance->replied_at ? $insurance->replied_at . '<br>' . humanReadableDiff($insurance->replied_at, $insurance->created_at) : '';
            $updated_at =  $insurance->client_update ? $insurance->client_update . '<br>' . $insurance->client_update->diffForHumans() : '';

            if($insurance->isClosed()){
                $status = ' <span class="badge badge-dark">'.__('skudomodule::insurance.closed').'</span>';
            }else
            {
                if($insurance->status == 1){
                    $status = ' <span class="badge badge-success">'.__('skudomodule::insurance.activated').'</span>';
                }elseif($insurance->status == 0)
                {
                    $status = '<span class="badge badge-info">'.__('skudomodule::insurance.pending').'</span>';
                }elseif($insurance->status == 3)
                    if(is_null($insurance->seen_at))
                    {
                        $status = '<span style="margin-bottom: 10px;" class="badge badge-warning">'.__('skudomodule::warranty.in_progress').'</span> '.'<span class="badge badge-info">'.__('skudomodule::insurance.replay_done').'</span>'. '<span class="badge badge-primary">'.__($updated_at).'</span>';
                    }
                    else
                    {
                        $status = '<span style="margin-bottom: 10px;" class="badge badge-warning">'.__('skudomodule::warranty.in_progress').'</span>';

                    }
                else
                {
                    $status = ' <span class="badge badge-danger">'.__('skudomodule::insurance.rejected').'</span>';
                }

            }

            $expire_date = $insurance->expire_date ? $insurance->expire_date->format('Y-m-d') : '';
            $adminName =  $insurance->admin->name ?? '-';

            $actionParts = [];
            if (auth('admin')->user() && auth('admin')->user()->can('update_skudo_insurance')) {
                $actionParts[] = '<li><a href="'.route('skudo.insurance.edit', $insurance->id).'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white"></i></a></li>';
            }
            if (auth('admin')->user() && auth('admin')->user()->can('delete_skudo_insurance')) {
                $actionParts[] = '<li><form class="inline" action="'.route('skudo.insurance.destroy', $insurance->id) .'" method="POST">'.method_field('DELETE') . csrf_field() .'<button class="unst" title="Delete" type="submit" onclick="return confirm(\''.__("skudomodule::admin.delete_warranty").'\')"><i class="flaticon-delete  bg-danger p-1 text-white"></i></button></form></li>';
            }
            $action = '<ul class="table-controls">'.implode('', $actionParts).'</ul>';


            $responce[]=[$id,$user_name,$phone,$dummy_text_1,$dummy_text_2,$attachments,$usage_date, $created_at,$replied_at,$status,$expire_date,$adminName,$action];

        }

        $results = ["sEcho" => $sEcho,
            "iTotalRecords" =>  $insurancesCount->count(),
            "iTotalDisplayRecords" => $insurancesCount->count(),
            "aaData" => $responce,
            "lengthMenu"=> [10, 20, 50, 100],
            "language"=> [
                "paginate"=> [
                    "previous"=> "<i class='flaticon-arrow-left-1'></i>",
                    "next"=> "<i class='flaticon-arrow-right'></i>"
                ],
                "info"=> "Showing page _PAGE_ of _PAGES_"
            ]
        ];

        echo json_encode($results);

    }
}
