<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    public function store($data)
    {
        $category = Category::create($data);

        return $category;
    }

    public function get($category)
    {
        return $category;
    }

    public function update($category, $data)
    {
        $category->update($data);

        return $category;
    }

    public function delete($category)
    {
        return $category->delete();
    }
}
