<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Modules\AdminModule\Repository\AdminRepository;
use Modules\AdminModule\Repository\PermissionRepository;
use Modules\AdminModule\Http\Requests\AdminRequest;
use Hash;
use Modules\AdminModule\Entities\Admin;
use Modules\AreaModule\Repository\ZoneRepository;
use Modules\OrderModule\Entities\Cart;
use Modules\OrderModule\Entities\Order;
use Modules\ProductModule\Entities\ProductReview;
use Modules\UserModule\Entities\Contactus;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Entities\User;
use Modules\WarrantyModule\Entities\Insurance;
use Modules\WarrantyModule\Entities\Returned;
use Modules\WarrantyModule\Entities\Warranty;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\OrderModule\Repository\OrderAdminRepository;
use Modules\UserModule\Repository\UserRepository;
use Modules\OrderModule\Entities\Status;


class AdminModuleController extends Controller
{

    public function __construct(AdminRepository      $adminRepository,
                                PermissionRepository $permissionRepository,
                                OrderRepository      $orderRepository,
                                OrderAdminRepository $orderAdminRepository,
                                UserRepository       $userRepository,
                                ZoneRepository       $zoneRepository)
    {


        $this->middleware('auth:admin');

        $this->middleware('permission:show_admins')->only('index');
        $this->middleware('permission:add_admins')->only('create');
        $this->middleware('permission:delete_admins')->only('destroy');
        $this->middleware('permission:update_admins')->only(['edit', 'update']);

        $this->adminRepository = $adminRepository;
        $this->permissionRepository = $permissionRepository;
        $this->orderRepository = $orderRepository;
        $this->orderAdminRepository = $orderAdminRepository;
        $this->userRepository = $userRepository;
        $this->zoneRepository = $zoneRepository;


    }

    public function dashboard()
    {

        $client_orders = $this->orderAdminRepository->clientOrdersCount();
        $merchant_orders = $this->orderAdminRepository->merchantOrdersCount();

        $incomes = $this->orderAdminRepository->calTotalIncome();

        $sales = $this->orderAdminRepository->calTotalSales();
        $clients = $this->userRepository->UsersCount();
        $merchants = $this->userRepository->MerchantsCount();

        $current_orders = $this->orderAdminRepository->current();
        $new = $this->orderAdminRepository->allNewOrdersCount();
        $preparing = $this->orderAdminRepository->allPreparingOrdersCount();
        $prepared = $this->orderAdminRepository->allPreparedOrdersCount();
        $charging = $this->orderAdminRepository->allShippingOrdersCount();
        $charged = $this->orderAdminRepository->allShippedOrdersCount();
        $finished = $this->orderAdminRepository->allDoneOrdersCount();
        $cancelled = $this->orderAdminRepository->allCancelledOrdersCount();
        return view('adminmodule::dashboard', compact('new', 'preparing', 'prepared', 'charging', 'charged', 'finished', 'cancelled', 'client_orders', 'merchant_orders', 'current_orders', 'clients', 'merchants', 'incomes', 'sales'));
    }

    public function notificationCounter(): JsonResponse
    {
        $notifications = [
            'merchant' => User::where('is_merchant', 1)->unseen()->count(),
            'insurance' => Insurance::unseen()->count(),
            'card_warranty' => Warranty::where('type', 'card')->unseen()->count(),
            'sms_warranty' => Warranty::where('type', 'sms')->unseen()->count(),
            'users_order' => Order::where('is_merchant', 0)->unseen()->count(),
            'merchants_order' => Order::where('is_merchant', 1)->unseen()->count(),
            'return' => Returned::unseen()->count(),
            'review' => ProductReview::unseen()->count(),
            'suggestion' => Suggestion::unseen()->count(),
            'cart' => Cart::unseen()->groupBy('user_id')->count(),
            'contact' => Contactus::unseen()->count(),
        ];

        return response()->json(['notifications' => $notifications]);
    }

    public function index()
    {
        $admins = $this->adminRepository->findAllAdmins();
        return view('adminmodule::admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = $this->permissionRepository->getAllRoles();
        $zones = $this->zoneRepository->findAll();
        $status = Status::all();
        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('adminmodule::admin.create', compact('roles', 'zones', 'status', 'phone_codes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(AdminRequest $request)
    {
        $data = $request->except('_token', 'orders_zones');
        $data['password'] = Hash::make($data['password']);

        $data['orders_zones'] = isset($request->orders_zones) ? implode(',', $request->orders_zones) : null;
        $data['status_levels'] = isset($request->status_levels) ? implode(',', $request->status_levels) : null;
        $admin = $this->adminRepository->saveAdmin($data);
        $this->permissionRepository->assignRoleToAdmin($admin, $data['role']);

        return redirect('admin/admins')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data = Admin::where('id', $id)->with(['roles'])->first();
        $roles = $this->permissionRepository->getAllRoles();
        $zones = $this->zoneRepository->findAll();
        $selectedZones = explode(',', $data->orders_zones);
        $status_levels = explode(',', $data->status_levels);
        $status = Status::all();
        $phone_codes = $this->userRepository->findAllPhoneCodes();

        return view('adminmodule::admin.edit', compact('data', 'roles', 'zones', 'selectedZones', 'status_levels', 'status', 'phone_codes'));
    }


    /**
     * Update the specified resource in storage.
     * @param AdminRequest $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(AdminRequest $request, $id)
    {
        $data = $request->except('_method', '_token', 'role', 'orders_zones');
        $admin = Admin::find($id);
        if (!empty($data['password']))
            $data['password'] = Hash::make($data['password']);
        else
            unset($data['password']);
        $data['orders_zones'] = isset($request->orders_zones) ? implode(',', $request->orders_zones) : null;
        $data['status_levels'] = isset($request->status_levels) ? implode(',', $request->status_levels) : null;
        $this->adminRepository->updateAdminData($admin, $data);
        $this->permissionRepository->updateAdminRole($admin, $request->role);

        return redirect('admin/admins')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->adminRepository->deleteAdmin($id);
        return redirect('admin/admins')->with('deleted', 'deleted');

    }
}
