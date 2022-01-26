<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $category;
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
    public function getItems($per_page)
    {
        return $this->model->paginate($per_page);
    }
    public function find($id)
    {
        return $this->model->find($id)->first();
    }
}
