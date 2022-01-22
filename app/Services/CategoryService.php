<?php

namespace App\Services;

use App\Http\Resources\CategoryListResource;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService
{
    protected $categoryRepo;
    use HasFactory;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }
    public function getItems($request)
    {
        $query = $request->all();
        $per_page = $query ? $query->per_page : 10;
        $items = $this->categoryRepo->getItems($per_page);
        return new CategoryListResource($items);
    }
}
