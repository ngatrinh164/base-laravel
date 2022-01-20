<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    public function getItems();
    public function getItem($id);
    public function update($id, $data);
    public function delete($id);
    public function create($data);
}
