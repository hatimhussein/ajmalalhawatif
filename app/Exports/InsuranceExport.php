<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\WarrantyModule\Repository\InsuranceRepository;

class InsuranceExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    private InsuranceRepository $insuranceRepository;

    public function __construct(InsuranceRepository $insuranceRepository)
    {
        $this->insuranceRepository = $insuranceRepository;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return $this->insuranceRepository->query()
            ->with(['admin'])
            ->get();
    }

    public function headings(): array
    {
        return [
            __('warrantymodule::warranty.warranty_number'),
            __('warrantymodule::insurance.user_name'),
            __('warrantymodule::insurance.phone'),
            __('warrantymodule::insurance.email'),
            __('warrantymodule::insurance.install_date'),
            __('warrantymodule::insurance.shop_name'),
            __('warrantymodule::insurance.qr_code_text'),
            __('warrantymodule::insurance.sent_at'),
            __('warrantymodule::insurance.status'),
            __('warrantymodule::insurance.expire_date'),
            __('warrantymodule::insurance.admin'),
        ];
    }

    public function map($row): array
    {
        switch ($row->status) {
            case 1:
                $status = __('warrantymodule::insurance.activated');
                break;
            case 0:
                $status = __('warrantymodule::insurance.pending');
                break;
            default:
                $status = __('warrantymodule::insurance.rejected');
                break;
        }

        return [
            $row->id,
            $row->user_name,
            $row->phone,
//            asset('images/warranty/' . $row->front_image),
//            asset('images/warranty/' . $row->back_image),
//            asset('images/warranty/' . $row->insurance_image),
            $row->email,
            $row->install_date ? $row->install_date->diffForHumans() : '',
            $row->shop_name,
            $row->qr_code_text,
            $row->created_at->diffForHumans(),
            $status,
            $row->expire_date ? $row->expire_date->format('Y-m-d') : '',
            $row->admin->name ?? '-',
        ];
    }
}
