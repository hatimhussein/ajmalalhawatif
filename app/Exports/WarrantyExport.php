<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\WarrantyModule\Repository\WarrantyRepository;

class WarrantyExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    private WarrantyRepository $warrantyRepository;

    public function __construct(WarrantyRepository $warrantyRepository)
    {
        $this->warrantyRepository = $warrantyRepository;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return $this->warrantyRepository->query()->where('is_applicable', '!=', null)
            ->with(['currency', 'admin', 'user'])
            ->get();
    }

    public function headings(): array
    {
        return [
            __('warrantymodule::warranty.warranty_id'),
            __('warrantymodule::warranty.account_number'),
            __('warrantymodule::warranty.client-merchant_name'),
            __('warrantymodule::warranty.front_image'),
            __('warrantymodule::warranty.back_image'),
            __('warrantymodule::warranty.warranty_image'),
            __('warrantymodule::warranty.warranty_number'),
            __('warrantymodule::warranty.user_notes'),
            __('warrantymodule::warranty.usage_date'),
            __('warrantymodule::warranty.sent_at'),
            __('warrantymodule::warranty.device_name'),
            __('warrantymodule::warranty.status'),
            __('warrantymodule::warranty.value'),
            __('configmodule::admin.currency'),
            __('warrantymodule::warranty.reason'),
            __('warrantymodule::warranty.admin'),
            __('warrantymodule::warranty.replied_at'),
            __('warrantymodule::warranty.application_number'),
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->user->account_number,
            $row->user->name,
            asset('images/warranty/' . $row->front_image),
            asset('images/warranty/' . $row->back_image),
            asset('images/warranty/' . $row->warranty_image),
            $row->warranty_number,
            $row->user_notes,
            $row->usage_date,
            $row->created_at,
            $row->device_name_ar,
            $row->is_applicable ? 'نعم' : 'ا',
            $row->value,
            $row->currency->name ?? '-',
            $row->reason ?? '-',
            $row->admin->name ?? '-',
            $row->replied_at,
            $row->application_number,
        ];
    }
}
