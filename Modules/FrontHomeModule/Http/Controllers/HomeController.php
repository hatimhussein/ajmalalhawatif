<?php

namespace Modules\FrontHomeModule\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\ConfigModule\Entities\AdvertiseSettting;
use Modules\ConfigModule\Entities\News;
use Modules\ProductModule\Repository\CategoryRepository;
use Modules\ProductModule\Repository\ProductRepository;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\Slider;
use Modules\ConfigModule\Entities\Advertisement;

use Modules\UserModule\Repository\UserRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;


class HomeController extends Controller
{
    use ApiResponseHelper;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository, UserRepository $userRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;


    }

    public function index()
    {
        $selected_categories = $this->categoryRepository->frontSelectedProducts();

        $dicount_products = $this->productRepository->producstHasDiscount();

        $sliders = Slider::all();

        $advertisements = Advertisement::orderBy('position', 'ASC')->get();
        $AdvertiseStatus = AdvertiseSettting::all();

        $wish_list = $this->userRepository->wishList();


        $viewed_level = (auth()->check() && auth()->user()->is_merchant) ? auth()->user()->prices_level : '5';
        $news = News::where('status', 1)->where('viewed_levels', 'like', '%' . $viewed_level . '%')->get();

        return view('fronthomemodule::index', compact('sliders', 'advertisements', 'selected_categories', 'wish_list', 'AdvertiseStatus', 'news'))
            ->with(['dicount_products' => $dicount_products]);
    }

    public function aboutUs()
    {
        return view('fronthomemodule::about');
    }

    public function suggestions()
    {
        return view('fronthomemodule::suggestions');
    }


    public function suggestionsStore(Request $request)
    {
        request()->validate([
            'additional_attachments'  => 'required|mimes:doc,docx,pdf,txt,jpg,jpeg,png,bmp,tiff,mp4,mov,ogg,qt,webm',
        ]);

        if ($files = $request->file('additional_attachments')) {

            //store file into document folder
            $file = $request->file->store('public/suggestions-documents');

            //store your file into database
            //$document = new Document();
            //$document->title = $file;
            //$document->save();

            return Response()->json([
                "success" => true,
                "file" => $file
            ]);

        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);

    }

    public function saveSuggestionComplaintForm(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'mobil' => 'required|regex:/^[+]*[0-9]{10,15}$/|max:15',
            'subject' => 'required',
//            'type' => 'required',
            'message' => 'required',
            'additional_attachments'  => 'nullable|mimes:doc,docx,pdf,txt,jpg,jpeg,png,bmp,tiff,mp4,mov,ogg,qt,webm,xlsx,doc,docx',
        ]);

        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['phone'] = $request->mobil;
        $data['generate']= Str::random(6);

        if ($request->file('additional_attachments')) {

            //store file into document folder
            $file = $request->file('additional_attachments')->store('public/suggestions-documents');
            $data['additional_attachments']= $file;
        }

        $this->userRepository->saveSuggestionComplaintForm($data);
        $message = __('commonmodule::validation.suggestion_success');
        return $this->setCode(200)->setSuccess($message)->send();
    }


    public function saveContactus(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[+]*[0-9]{10,15}$/|max:15',
            'message' => 'required'
        ]);
        $data = $request->except('_token');
        $this->userRepository->saveContactus($data);
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.saved'))->send();
    }


    public function contactUs()
    {
        return view('fronthomemodule::contact_us');
    }

    public function brands()
    {
        return view('fronthomemodule::brands');
    }


}
