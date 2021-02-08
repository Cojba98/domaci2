<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Resources\ResourceCategory;
use App\Http\Resources\ResourceProduct;


class CategoryController extends BaseController
{
    public function getCategories(){
        $categories = Category::all();
        return $categories;
    }

    public function show($name){

        $categories = Category::find($name);

        $category = Category::firstWhere('name', $name);

        if(is_null($category))
        return $this->sendError("Nepoznata kategorija");

        $products = Product::all();
        $filteredProducts = $products->where('category_id', $category->id);


        if(is_null($filteredProducts))
        return $this->sendError("Nema proizvoda ove kategorije");

        if($filteredProducts->isEmpty())
        return $this->sendError("Nema proizvoda ove kategorije");

        return $this->sendResponse(ResourceProduct::collection($filteredProducts->all()), "Proizvod pronadjen");
    }

    public function index(){
        $producers = Category::all();
        return $this->sendResponse(ResourceCategory::collection($producers), "Kategorije uspesno pronadjene");
    }

}
