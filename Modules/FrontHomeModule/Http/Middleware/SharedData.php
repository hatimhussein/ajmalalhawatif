<?php

namespace Modules\FrontHomeModule\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Modules\ConfigModule\Entities\Color;
use Modules\ConfigModule\Entities\Currency;
use Modules\ConfigModule\Entities\MenuLink;
use Modules\ConfigModule\Entities\News;
use Modules\ConfigModule\Entities\PaymentMethod;
use Modules\ConfigModule\Entities\Seo;
use Modules\ConfigModule\Entities\ShippingMethod;
use Modules\ConfigModule\Entities\Tax;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Repository\CategoryRepository;
use Modules\WarrantyModule\Repository\WarrantyRepository;

class SharedData
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $configs = app('site_data');
        view()->share('site_data', $configs);

        $configRepository = new ConfigRepository();
        $configRepository->preparePaymentMethods();

        /* share tax settings */
        $tax = Tax::first();
        App::singleton('tax_settings', function () use ($tax) {
            return $tax;
        });


        if (!$request->is('*admin/*', '*admin')) {

            /* prepare Cart Data */
            $orderRepository = new OrderRepository();
            $cart_data = $orderRepository->getCartData();
            App::singleton('cart_data', function () use ($cart_data) {
                return $cart_data;
            });
            view()->share('cart_data', $cart_data);

            if (!$request->ajax()) {
                $menu_links = MenuLink::where('status', 1)->orderBy('sort', 'asc')->get();
                view()->share('menu_links', $menu_links);

                $categoryRepository = new CategoryRepository();
                $categories = $categoryRepository->findParentCategories();
                view()->share('categories', $categories);

                $brands = Brand::all();
                view()->share('brands', $brands);

                $colors = Color::all();
                view()->share('colors', $colors);

                $currencies = Currency::where('status', 1)->get();
                view()->share('currencies', $currencies);

                $socialLinks = $configs->where('category_id', 3);
                view()->share('socialLinks', $socialLinks);

                $hotlines = explode(',', $configs->where('key', 'hotline')->first()->value_ar);
                view()->share('hotlines', $hotlines);

                $emails = explode(',', $configs->where('key', 'email')->first()->value_ar);
                view()->share('emails', $emails);

                $websiteLogo = $configs->where('key', 'logo')->first()->photo;
                view()->share('websiteLogo', $websiteLogo);
                $websiteLogo_footer = $configs->where('key', 'logo_footer')->first()->photo;
                view()->share('websiteLogo_footer', $websiteLogo_footer);

                $payment_method = PaymentMethod::all();
                view()->share('payment_method', $payment_method);

                $shipping_method = ShippingMethod::all();
                view()->share('shipping_method', $shipping_method);

                $seo_info = Seo::where('url', request()->url())->orWhere('url', request()->url() . '/')->first();
                view()->share('seo_info', $seo_info);

                $show_warranty = (auth()->check() && auth()->user()->is_merchant) || auth()->guest();
//                $unreadWarranties = false;
//                if (auth()->check()) {
//                    $user = auth()->user();
//                    $warrantyRepository = new WarrantyRepository();
//                    $show_warranty = $warrantyRepository->isUserWarrantyEnabled($user, $configs);

//                    if (!$request->is('warranty')) {
//                        $unreadWarranties = $warrantyRepository->userUnReadReplies($user);
//                    }
//                }
                view()->share('show_warranty', $show_warranty);
//                view()->share('unreadWarranties', $unreadWarranties);
            }
        }


        return $next($request);
    }
}
