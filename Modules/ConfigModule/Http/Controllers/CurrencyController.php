<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Repository\CurrencyRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ConfigModule\Entities\Currency;

class CurrencyController extends Controller
{
      use ApiResponseHelper;

      private $currencyRepository;
      public function __construct(CurrencyRepository $currencyRepository){

        $this->middleware('auth:admin')->except('changeCurrency');
        $this->middleware('permission:show_currency')->only('index');
        $this->middleware('permission:add_currency')->only('create');
        $this->middleware('permission:delete_currency')->only('destroy');
        $this->middleware('permission:update_currency')->only(['edit','update']);

        $this->currencyRepository=$currencyRepository;

      }


      public function index()
      {

        $currencies=$this->currencyRepository->FindAll();

        return view('configmodule::admin.currency.index',compact('currencies'));
      }

      public function create()
      {
          return view('configmodule::admin.currency.create');
      }
      public function store(Request $request)
      {


        request()->validate([
          'name_ar' => 'required',
          'name_en' => 'required',
          'code' => 'required',
          'symbol' => 'required',
          'value' => 'required|numeric',
          'status' => 'required',
        ]);

        $data=$this->currencyRepository->savecurrency($request->except('_token'));

        return redirect('admin/currency');

      }

      public function edit($id)
      {
        $currency=$this->currencyRepository->findById($id);

        return view('configmodule::admin.currency.edit',compact('currency'));
      }

      public function update(Request $request, $id)
      {
        request()->validate([
          'name_ar' => 'required',
          'name_en' => 'required',
          'code' => 'required',
          'symbol' => 'required',
          'value' => 'required|numeric',
          'status' => 'required',
        ]);

        $data=$request->except(['_token','_method']);

        $currency=$this->currencyRepository->update($data,$id);
        return redirect('admin/currency');

      }
      public function destroy($id)
      {
        $status=$this->currencyRepository->delete($id);
        if($status)
          return redirect('admin/currency')->with('deleted','deleted');
        
         return redirect('admin/currency')->with('deleted',__('configmodule::admin.cant_delete_currency'));

      }

      function setDefaultCurrency(Request $request)
      {
        $this->currencyRepository->setDefaultCurrency($request->id);

        return $this->setCode(200)->setSuccess('Successfuly Updated')->send();
      }


        function changeCurrency($id)
        {


            $currency= Currency::where('id',$id)->first();
             if($currency)
               session(['currency' => $currency]);
              //setcookie("currency", $currency, time() + (86400 * 30));

             return redirect()->back();
        }
}
