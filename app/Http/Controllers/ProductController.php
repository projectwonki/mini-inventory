<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Client\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $response['data'] = [];

        if ($products->count() < 1) {
            $response['message'] = 'products empty';
            return response()->json($response, 204);
        }

        $data = [];

        foreach ($products as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'name' => $value->name,
                'qty' => $value->qty
            );
        }

        $response['message'] = 'success get products';
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function show(Product $productId)
    {
        $product = Product::find($productId);

        if ($product === null) {
            $response['message'] = 'products is not found';
            return response()->json($response, 204);
        }

        $data = array(
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $product->qty
        );

        $response['message'] = 'success get product';
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->input('name'),
            'qty' => $request->input('qty')
        ]);

        $response['message'] = 'success create product';
        return response()->json($response, 200);
    }

    public function update(Request $request, Product $productId)
    {
        if (Product::find($productId) === null) {
            $response['message'] = 'product is not found';
            return response()->json($response, 204);
        }

        Product::whereId($productId)->update([
            'name' => $request->input('name'),
            'qty' => $request->input('qty')
        ]);

        $response['message'] = 'success update product';
        return response()->json($response, 200);
    }

    public function destroy(Product $productId)
    {
        if (Product::find($productId) === null) {
            $response['message'] = 'products is not found';
            return response()->json($response, 204);
        }

        Product::whereId($productId)->delete();

        $response['message'] = 'success destroy product';
        return response()->json($response, 200);
    }
}