<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Entities\Config;

use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\OrderModule\Entities\Status;
use Session;

class ConfigModuleController extends Controller
{
    use UploaderHelper;


    /**
     * @var ConfigRepository
     */
    private ConfigRepository $configRepository;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->middleware('auth:admin')->except('configDetails');
        $this->middleware('permission:config')->except('configDetails');

        $this->configRepository = $configRepository;
    }


    function config()
    {
        $configCategorires = $this->configRepository->configCategorires();

        return view('configmodule::admin.config', compact('configCategorires'));
    }

    function updateInvoiceStatus()
    {
        $status = Status::query()->get();

        return view('configmodule::admin.invoice.invoice_status', compact('status'));
    }

    function updateInvoiceStatusStore(Request $request)
    {
        $status = Status::query()->get();
        foreach ($status as $st){
            $st->update([
                'able_print' => 0
            ]);
        }

        $status = Status::query()->whereIn('id', $request->status_id)->get();
        foreach ($status as $st){
            $st->update([
                'able_print' => 1
            ]);
        }

        return redirect()->back()->with('updated', 'updated');;
    }

    function updateConfig(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:jpeg,png,jpg,mp4,qt'
        ]);

        $data = $request->except('_token');


        if ($request->file('photo')) {
            $data['photo'] = $this->uploadFile($request->file('photo'), 'img');
        }

        $this->configRepository->update($data);

        return redirect('admin/config')->with('updated', 'updated');
    }

    function updateConfigArray(Request $request)
    {
        $data = $request->except('_token');
        $this->configRepository->updateConfigArray($data);
        return redirect('admin/config')->with('updated', 'updated');
    }

    function updateInsuranceConfig(Request $request)
    {
        $data = $request->except('_token', 'category_id');

        foreach ($data as $key => $value) {
            $value['key'] = $key;
            $this->configRepository->update($value, $request->get('category_id'));
        }

        return redirect('admin/config')->with('updated', 'updated');
    }

    function updateConfigArrayShare(Request $request)
    {
        $data = $request->except('_token');
        $this->configRepository->updateConfigArrayShare($data);
        return redirect('admin/config')->with('updated', 'updated');
    }

    function updateSmsSettings(Request $request)
    {
        $request->validate([
            'sms_driver' => 'required|in:' . implode(',', array_keys(config('sms.drivers')))
        ]);

        $data = $request->except('_token');

        $this->configRepository->updateConfigArray($data);
        return redirect('admin/config')->with('updated', 'updated');
    }

    function configDetails($id)
    {
        $config = Config::where('id', $id)->first();

        if (request()->ajax()) {
            return view('configmodule::front.configRender', compact('config'));
        }

        // $polices=Config::whereIn('category_id',[2,1])->orderBy('id')->get();
        $polices = $this->configRepository->getConfigByCategoryId([2, 1]);
        return view('configmodule::front.about', compact('polices', 'config'));

    }


}
