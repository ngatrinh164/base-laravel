<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $repo;
    use HasFactory;
    public function __construct($repo)
    {
        $this->repo = $repo;
    }
    public function fetchItems($request)
    {
        $query = $request->all();
        $per_page = $query ? $query->per_page : 10;
        $items = $this->repo->getItems($per_page);
        return $items;
    }
    public function getItem($id)
    {
        return $this->repo->getItem($id);
    }
    public function deleteItem($id)
    {
        $item = $this->repo->find($id);
        if (!$item) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
        $item->delete();
        return response()->json([
            'message' => 'Delete successfull'
        ], 200);
    }
}
