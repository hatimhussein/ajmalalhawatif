<?php

namespace Modules\ProductFeatureModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ProductFeatureModule\Repository\OfferRepository;
use Modules\UserModule\Repository\UserRepository;
use Modules\ProductModule\Repository\ProductRepository;

use Modules\CommonModule\Helper\UploaderHelper;
use Modules\CommonModule\Helper\ApiResponseHelper;

use Modules\ProductModule\Entities\ProductDiscount;


class OfferController extends Controller
{
    use ApiResponseHelper;

    use UploaderHelper;

    private OfferRepository $offerRepository;
    private ProductRepository $productRepository;
    private UserRepository $userRepository;

    public function __construct(OfferRepository $offerRepository, UserRepository $userRepository, ProductRepository $productRepository)
    {

        $this->offerRepository = $offerRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;

        $this->middleware('permission:show_offer')->only('index');
        $this->middleware('permission:add_offer')->only('create');
        $this->middleware('permission:delete_offer')->only('destroy');
        $this->middleware('permission:update_offer')->only(['edit', 'update']);

    }


    public function offers()
    {
        $offers = $this->offerRepository->allOffers();

        return view('productfeaturemodule::front.offers', compact('offers'));
    }

    public function offerProducts($id)
    {
        $offer = $this->offerRepository->offerProducts($id);
        $wish_list = $this->userRepository->wishlist();
        return view('productfeaturemodule::front.offerDetails', compact('offer', 'wish_list'));
    }


    public function index()
    {
        $offers = $this->offerRepository->findAll();

        return view('productfeaturemodule::admin.offer.index', compact('offers'));
    }

    public function create()
    {
        $products = $this->productRepository->findAllProductsToOffers();
        return view('productfeaturemodule::admin.offer.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'desc_ar' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required',
            'value' => 'required|numeric',
            'name_en' => 'required',
            'desc_en' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'offer_products' => 'required',
        ]);


        $data = $request->except('_token');

        $data['photo'] = $this->upload($request->file('photo'), 'offers');
        $offer = $this->offerRepository->saveOffer($data);

        foreach ($data['offer_products'] as $key => $value) {
            ProductDiscount::create(['product_id' => $value, 'start_date' => $data['start_date'], 'end_date' => $data['end_date'],
                'discount_type' => $data['type'], 'discount_value' => $data['value'], 'discount_quantity' => 1, 'offer_id' => $offer->id,]);
        }

        return redirect('admin/offers')->with('success', 'success');
    }


    public function show($id)
    {
        return view('productfeaturemodule::show');
    }

    public function edit($id)
    {
        $products = $this->productRepository->findAllProductsToOffers();
        $offer = $this->offerRepository->findOfferById($id);


        return view('productfeaturemodule::admin.offer.edit', compact('products', 'offer'));

    }

    public function SearchOfferProduct(Request $request)
    {
        $items = $this->productRepository->searchOfferProducts($request->get('search'));
        $items->prepend(['id' => 'all' , 'text'=>__('adminmodule::admin.select_all')]);
        return \response()->json(['items'=>$items]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'desc_ar' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required',
            'name_en' => 'required',
            'desc_en' => 'required',
            'value' => 'required|numeric',
            'offer_products' => 'required',
        ]);


        $data = $request->except('_token', '_method', 'offer_products');
        if ($request->file('photo'))
            $data['photo'] = $this->upload($request->file('photo'), 'offers');

        $this->offerRepository->updateOffer($data, $id);

        ProductDiscount::where('offer_id', $id)->delete();

        foreach ($request->offer_products as $key => $value) {
            ProductDiscount::create(['product_id' => $value, 'start_date' => $data['start_date'], 'end_date' => $data['end_date'],
                'discount_type' => $data['type'], 'discount_value' => $data['value'], 'discount_quantity' => 1, 'offer_id' => $id,]);
        }

        return redirect('admin/offers')->with('updated', 'updated');


    }


    public function destroy($id)
    {
        $offer = $this->offerRepository->deleteOffer($id);
        return redirect('admin/offers')->with('deleted', 'deleted');

    }
}
