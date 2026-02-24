<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Requests\Category\CategoryStoreController;
use App\Http\Requests\Category\CategoryUpdateController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;


class CategoryController extends BaseController
{
    public function index()
    {
        $categories = $this->service->index();

        return CategoryResource::collection($categories);
    }

    public function store(CategoryStoreController $request)
    {
        $data = $request->validated();
        $category = $this->service->store($data);

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        $category = $this->service->get($category);

        return new CategoryResource($category);
    }

    public function update(CategoryUpdateController $request, Category $category)
    {
        $data = $request->validated();
        $this->service->update($category, $data);

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $this->service->delete($category);

        return response()->json([
            'message' => 'Category deleted.'
        ]);
    }
}
