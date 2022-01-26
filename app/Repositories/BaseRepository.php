<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function create($item)
    {
        $this->model->fill($item);
        $this->model->save();
        return $this->model;
    }
    public function update($id, $item)
    {
        $itemUpdate = $this->model->find($id)->first();
        $itemUpdate->update($item);
        $itemUpdate->save();
        return $itemUpdate;
    }
    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
