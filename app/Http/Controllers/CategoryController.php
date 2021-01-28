<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CrudController
{
    public function __construct(Category $category)
    {
        $this->entity = $category;
        $this->resourceCollection = CategoryResource::collection($this->entity->paginate(5));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entidade = new CategoryResource(Category::findOrFail($id));
        return $entidade;
    }
}
