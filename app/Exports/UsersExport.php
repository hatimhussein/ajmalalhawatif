<?php

namespace App\Exports;

use Modules\UserModule\Entities\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()

    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'رقم الحساب',
            'اسم الشركه',
            'الشخص المفوض',
            'البريد الالكترونى',
            'كود الدولة',
            'رقم الهاتف',
            'السجل التجاري',
            'الرقم الضريبي',
            'الحالة',
            'الدفع عند الاستلام',
            'لديه حساب اجل',
            'التحويل البنكي',
            'مستوى الاسعار',
            'الدولة',
            'المنطقة',
            'المدينة',
            'المحافظة',
            'الشعار',
            'كلمة المرور',
            'تاريخ التسجيل',
        ];
    }

    public function map($user): array
    {

        return [
            $user->account_number,
            $user->company_name,
            $user->authorized_person,
            $user->email,
            $user->code->code,
            $user->phone,
            $user->commercial_register,
            $user->tax_number,
            $user->is_active,
            $user->can_cash,
            $user->has_forward_account,
            $user->bank_transfer,
            $user->prices_level,
            $user->country->name_ar,
            $user->zone->name_ar,
            $user->city->name_ar,
            $user->government->name_ar,
            $user->logo,
            '',
            $user->created_at,
        ];
    }
}
