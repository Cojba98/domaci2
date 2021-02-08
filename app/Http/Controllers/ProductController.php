<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ResourceProduct;
use Illuminate\Support\Facades\Validator;


class ProductController extends BaseController
{
    // public function getProducts(){
    //     return view('addProduct');
    // }

    // public function get(){
    //     $products = Product::all();
    //     return $this->sendResponse(ResourceProduct::collection($products), "Proizvodi uspesno pronadjeni!");
    // }

    // public function addProduct(Request $request){
    //     $product = new Product();
    //     $product->name = $request->name;
    //     $product->price = $request->price;
    //     $product->size = $request->size;
    //     $product->producer_id = $request->producer_id;
    //     $product->category_id = $request->category_id;
    //     $product->save();
    //     return redirect('products');
    // }

    // public function getProduct($id){
    //     $product = Product::find($id);
    //     return view('product', compact('product'));
    // }

    // public function deleteProduct($id){
    //     $product = Product::find($id);
    //     $product->delete();
    //     return redirect('products');
    // }

    public function index(){
        $products = Product::all();
        return $this->sendResponse(ResourceProduct::collection($products), "Proizvodi uspesno pronadjeni");
    }

    public function show($id){



        $product = Product::find($id);

        if(is_null($product))
        return $this->sendError("Proizvod nije pronadjen");

        return $this->sendResponse(new ResourceProduct($product), "Proizvod pronadjen");
    }

    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'producer_id'=>'required',
            'category_id'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError("Unesite ispravne vrednosti za sve atribute");
        }

        $product = Product::create($input);

        return $this->sendResponse(new ResourceProduct($product), "Proizvod uspesno sacuvan");
    }

    public function destroy($id){
        $product = Product::find($id);


        if(is_null($product)){
            return $this->sendError("Proizvod ne postoji u bazi");
        }

        $product->delete();

        return $this->sendResponse($product, "Proizvod uspesno izbrisan");

    }

    public function update(Request $request, Product $product){
        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'producer_id'=>'required',
            'category_id'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError("Unesite ispravne vrednosti za sve atribute");
        }

        $product->name = $input['name'];
        $product->size = $input['size'];
        $product->price = $input['price'];
        $product->producer_id = $input['producer_id'];
        $product->category_id = $input['category_id'];


        return $this->sendResponse(new ResourceProduct($product), "Proizvod uspesno izmenjen");
    }
}
