<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|in:makanan,minuman,makeup',
            'expired_at' => 'required|date',
        ]);

        if ($validator->fails()){
            return response()
            ->json($validator->messages())
            ->setStatusCode(422);

        }

        $validated = $validator->validated();

        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'expired_at' => $validated['expired_at'],
        ]);

        return response()->json([
            'messages' => 'Data berhasil disimpan'
        ])->setStatusCode(201);

    }

    public function show(){
        $products = Product ::all();
        return response()->json($products)->setStatusCode(200);
    }

    public function detail($id){
        $product = Product::find($id);

        if($product){

            return response()->json($product)->setStatusCode(200);
        }

        return response()->json([
            'messages' => 'produk tidak ditemukan'
        ])->setStatusCode(404);
    }
    public function filter($name){
        $product = Product::where('name','like','%'.$name.'%')->get();

        if($product){

            return response()->json($product)->setStatusCode(200);
        }

        return response()->json([
            'messages' => 'produk tidak ditemukan'
        ])->setStatusCode(404);
    }
}

