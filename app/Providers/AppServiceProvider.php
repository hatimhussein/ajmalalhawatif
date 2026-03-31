<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\ConfigModule\Repository\ConfigRepository;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // اربط site_data دايمًا حتى لو فاضي، لضمان عدم فشل app('site_data')
        $this->app->singleton('site_data', function () {
            return collect(); // أو مصفوفة []
        });
    }

    public function boot()
    {
        Paginator::useBootstrap();

        Schema::defaultStringLength(191);

        try {
            $configRepository = new ConfigRepository();

            $configs = $configRepository->getConfigByCategoryId([1,2,3,4,5,6,7,8,9]);

            // حدّث القيمة داخل الحاوية بعد توفّر البيانات
            $this->app->extend('site_data', function ($old) use ($configs) {
                return $configs;
            });

            $configRepository->setMailConfigs($configs);
            $configRepository->setSmsConfigs($configs);
            $configRepository->setInitConfigs($configs);

        } catch (Exception $e) {
            // في حال الفشل، يظل binding موجود لكن بقيمة فاضية
            // ممكن تسجّل لوغ هنا إن احتجت
        }
    }
}
