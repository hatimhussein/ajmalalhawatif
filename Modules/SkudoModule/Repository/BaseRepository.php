<?php


namespace Modules\SkudoModule\Repository;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    abstract public function model(): string;

    public function object($attributes = []): Model
    {
        $model = $this->model();
        return new $model($attributes);
    }

    public function query(): Builder
    {
        $model = $this->model();
        return $model::query();
    }

    public function all($columns = ['*'])
    {
        return $this->query()->get($columns);
    }

    public function get($params = [], $columns = ['*'])
    {
        $query = $this->query();
        foreach ($params as $col => $val) {
            $query->where($col, $val);
        }
        return $query->get($columns);
    }

    public function first($params = [], $columns = ['*'])
    {
        $query = $this->query();
        foreach ($params as $col => $val) {
            $query->where($col, $val);
        }
        return $query->first($columns);
    }

    public function firstOrFail($params = [], $columns = ['*'])
    {
        $item = $this->first($params, $columns);

        if (!$item) abort(404);

        return $item;
    }

    public function create($return)
    {
        return $this->query()->create($return);
    }

    public function createMany($returns): Collection
    {
        $created = $this->object()->newCollection();
        foreach ($returns as $return) {
            $created->push($this->create($return));
        }
        return $created;
    }

    public function newMarkSeen(Collection $items,$id)
    {
        foreach ($items as $item){
            $item->where('id', $id)->update(['seen_at' => now()]);
        }
    }
    public function markSeen(Collection $items)
    {
        $items->where('seen_at', null)->each->update(['seen_at' => now()]);
    }
}
