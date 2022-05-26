<?php

namespace App\Providers;

use App;
use Exception;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\ConfigModule\Repository\ConfigRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        try {
            $configRepository = new ConfigRepository();

            $configs = $configRepository->getConfigByCategoryId([1, 2, 3, 4, 5, 6, 7, 8, 9]);
            App::singleton('site_data', function () use ($configs) {
                return $configs;
            });

            $configRepository->setMailConfigs($configs);
            $configRepository->setSmsConfigs($configs);
            $configRepository->setInitConfigs($configs);

        } catch (Exception $e) {
//            App::singleton('site_data', function () {
//                return collect([]);
//            });
        }
    }
}
