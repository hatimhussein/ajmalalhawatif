<?php

namespace Modules\ConfigModule\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Entities\PaymentMethod;
use Modules\CommonModule\Helper\UploaderHelper;

class PaymentMethodController extends Controller
{

    use UploaderHelper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:show_payment_method')->only('index');
        $this->middleware('permission:add_payment_method')->only('create');
        $this->middleware('permission:delete_payment_method')->only('destroy');
        $this->middleware('permission:update_payment_method')->only(['edit', 'update']);

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $methods = PaymentMethod::all();
        $bank_accounts = BankAccount::query()->get();

        return view('configmodule::admin.paymentmethod.index', compact('methods', 'bank_accounts'));
    }

    public function storeBankAccount(Request $request)
    {
        $request->validate([
            'logo_path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'bank_name' => 'required|string',
            'owner_account_name' => 'required|string',
            'iban_number' => 'required|string',
            'account_number' => 'required|numeric',
        ]);

        BankAccount::create([
            'logo_path' => $this->upload($request->file('logo_path'), 'img'),
            'bank_name' => $request->bank_name,
            'owner_account_name' => $request->owner_account_name,
            'iban_number' => $request->iban_number,
            'account_number' => $request->account_number,
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function store(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data['image'] = $this->upload($request->file('photo'), 'img');
        PaymentMethod::create($data);
        return redirect()->back()->with('success', 'success');
    }

    public function destroy($id)
    {
        PaymentMethod::destroy($id);

        return redirect()->back()->with('deleted', 'deleted');
    }
}
