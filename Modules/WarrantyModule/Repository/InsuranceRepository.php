<?php


namespace Modules\WarrantyModule\Repository;


use Illuminate\Database\Eloquent\Builder;
use Modules\WarrantyModule\Entities\Insurance;

class InsuranceRepository extends BaseRepository
{
    public function model(): string
    {
        return Insurance::class;
    }


    public function searchQuery($keyword): Builder
    {
        return $this->query()->with('merchant')
            ->where('id', $keyword)
            ->orWhere('user_name', $keyword)
            ->orWhere('phone', ltrim($keyword, '0'))
            ->orWhere('email', $keyword)
            ->orderByDesc('id');

    }
}
