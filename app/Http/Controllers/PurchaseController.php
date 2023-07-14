<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Client\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('id', 'desc')->get();
        $response['data'] = [];

        if ($purchases->count() < 1) {
            $response['message'] = 'purchases empty';
            return response()->json($response, 204);
        }

        $data = [];

        foreach ($purchases as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'product' => array(
                    'id' => $value->product->id,
                    'name' => $value->product->name,
                    'qty' => $value->product->qty
                ),
                'supplier' => array(
                    'id' => $value->supplier->id,
                    'name' => $value->supplier->name
                ),
                'qty' => $value->qty,
                'date' => $value->date
            );
        }

        $response['message'] = 'success get purchases';
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function show(Purchase $purchaseId)
    {
        $purchase = Purchase::find($purchaseId);

        if ($purchase === null) {
            $response['message'] = 'purchase is not found';
            return response()->json($response, 204);
        }

        $data = array(
            'id' => $purchase->id,
            'product' => array(
                'id' => $purchase->product->id,
                'name' => $purchase->product->name,
                'qty' => $purchase->product->qty
            ),
            'supplier' => array(
                'id' => $purchase->supplier->id,
                'name' => $purchase->supplier->name
            ),
            'qty' => $purchase->qty,
            'date' => $purchase->date
        );

        $response['message'] = 'success get product';
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        Purchase::create([
            'qty' => $request->input('qty'),
            'date' => $request->input('date'),
            'product_id' => $request->input('product_id'),
            'supplier_id' => $request->input('supplier_id')
        ]);

        Product::whereId($request->input('product_id'))->decrement('qty', $request->input('qty'));

        $response['message'] = 'success create purchase';
        return response()->json($response, 200);
    }

    public function update(Request $request, Purchase $purchaseId)
    {
        if (Purchase::find($purchaseId) === null) {
            $response['message'] = 'purchase is not found';
            return response()->json($response, 204);
        }

        Purchase::whereId($purchaseId)->update([
            'qty' => $request->input('qty'),
            'date' => $request->input('date'),
            'product_id' => $request->input('product_id'),
            'supplier_id' => $request->input('supplier_id')
        ]);

        $response['message'] = 'success update purchase';
        return response()->json($response, 200);
    }

    public function destroy(Purchase $purchaseId)
    {
        if (Purchase::find($purchaseId) === null) {
            $response['message'] = 'purchase is not found';
            return response()->json($response, 204);
        }

        Purchase::whereId($purchaseId)->delete();

        $response['message'] = 'success destroy purchase';
        return response()->json($response, 200);
    }
}