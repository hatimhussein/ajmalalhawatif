<?php

namespace Modules\SkudoModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SkudoPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $guard = 'admin';
        $categoryId = 1; // show in grouped list

        $groups = [
            [
                'title' => 'ضمانات سكودو',
                'permissions' => [
                    'show_skudo_insurance',
                    'add_skudo_insurance',
                    'update_skudo_insurance',
                    'delete_skudo_insurance',
                ],
            ],
            [
                'title' => 'مطالبات سكودو',
                'permissions' => [
                    'show_skudo_warranty',
                    'add_skudo_warranty',
                    'update_skudo_warranty',
                    'delete_skudo_warranty',
                ],
            ],
            [
                'title' => 'الأرقام التسلسلية',
                'permissions' => [
                    'show_skudo_serial_numbers',
                    'add_skudo_serial_numbers',
                    'update_skudo_serial_numbers',
                    'delete_skudo_serial_numbers',
                ],
            ],
        ];

        foreach ($groups as $group) {
            foreach ($group['permissions'] as $name) {
                Permission::query()->updateOrCreate(
                    ['name' => $name, 'guard_name' => $guard],
                    ['category_id' => $categoryId, 'title' => $group['title']]
                );
            }
        }
    }
}


