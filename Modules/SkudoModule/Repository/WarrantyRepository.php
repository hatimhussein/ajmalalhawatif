<?php


namespace Modules\SkudoModule\Repository;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\SkudoModule\Entities\Returned;
use Modules\SkudoModule\Entities\ReturnReason;
use Modules\SkudoModule\Entities\Warranty;
use phpDocumentor\Reflection\Types\This;

class WarrantyRepository extends BaseRepository
{
    public function model(): string
    {
        return Warranty::class;
    }

    public function getUserWarranties($user_id, $search = null, $columns = ['*'])
    {
        $query = $this->query()->with('merchant', 'phone_code', 'currency')
            ->where('user_id', $user_id)
            ->orderByDesc('id')->select($columns);
        if ($search) {
            return $query->where(function ($query) use ($search) {
                return $query->where('user_name', 'like', "%$search%")
                    ->orWhere('insurance_id', $search)
                    ->orWhereHas('merchant', function ($q) use ($search) {
                        return $q->where('company_name', 'like', "%$search%")
                            ->orWhere('account_number', $search);
                    })
                    ->orWhere('phone', ltrim($search, '0'))
                    ->orWhere('id', $search);
            })->orderByDesc('id')->get();
        } else {
            return $query->get();
        }
    }

    public function readUserWarranties($user_id): int
    {
        return $this->query()
            ->where('user_id', $user_id)
            ->where('replied_at', '!=', null)
            ->update(['read_at' => now()]);
    }

    public function isUserWarrantyEnabled($user, $configs): bool
    {
        if ($user->is_merchant) {
            return $configs->where('key', 'warranty')->first()->value_en ?? false;
        } else {
            return $configs->where('key', 'warranty')->first()->value_ar ?? false;
        }
    }

    public function userUnReadReplies($user)
    {
        return $user->warranties()->where('replied_at', '!=', null)->where('read_at', null)->count();
    }
}
