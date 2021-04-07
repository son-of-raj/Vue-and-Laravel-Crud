<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function store(Request $request)
    {
      $product = new Product([
        'oem' => $request->get('oem'),
        'model_no' => $request->get('model_no'),
        'product_type' => $request->get('product_type'),
        'price' => $request->get('price'),
        'config' => $request->get('config')
      ]);

      $product->save();

      return response()->json('successfully added');
    }

    public function index()
    {
      return new ProductCollection(Product::all());
    }

    public function edit($id)
    {
      $product = Product::find($id);
      return response()->json($product);
    }

    public function update($id, Request $request)
    {
      $product = Product::find($id);

      $product->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $product = Product::find($id);

      $product->delete();

      return response()->json('successfully deleted');
    }









}
