<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        $response['data'] = [];

        if ($suppliers->count() < 1) {
            $response['message'] = 'suppliers empty';
            return response()->json($response, 204);
        }

        $data = [];

        foreach ($suppliers as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'name' => $value->name
            );
        }

        $response['message'] = 'success get suppliers';
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function show($supplierId)
    {
        $supplier = Supplier::find($supplierId);

        if ($supplier === null) {
            $response['message'] = 'supplier is not found';
            return response()->json($response, 204);
        }

        $data = array(
            'id' => $supplier->id,
            'name' => $supplier->name
        );

        $response['message'] = 'success get supplier';
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        Supplier::create([
            'name' => $request->input('name')
        ]);

        $response['message'] = 'success create supplier';
        return response()->json($response, 200);
    }

    public function update(Request $request, $supplierId)
    {
        if (Supplier::find($supplierId) === null) {
            $response['message'] = 'supplier is not found';
            return response()->json($response, 204);
        }

        Supplier::whereId($supplierId)->update([
            'name' => $request->input('name')
        ]);

        $response['message'] = 'success update supplier';
        return response()->json($response, 200);
    }

    public function destroy($supplierId)
    {
        if (Supplier::find($supplierId) === null) {
            $response['message'] = 'supplier is not found';
            return response()->json($response, 204);
        }

        Supplier::whereId($supplierId)->delete();

        $response['message'] = 'success destroy supplier';
        return response()->json($response, 200);
    }
}