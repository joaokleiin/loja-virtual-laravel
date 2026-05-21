<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProductsControllerApi extends Controller
{
    //

    public function index()
    {
        $productList = Product::all();

        return response()->json([
            "success" => true,
            "message" => "Lista de produtos",
            "data" => $productList
        ]);
    }

    

    public function loginapi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            throw ValidationException::withMessages([
                'email' => ['As credenciais são inválidas.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken('token')->plainTextToken
        ]);
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
        'type_id' => 'required',
        'supplier_id' => 'nullable',
        'imagem' => 'nullable'
    ]);

    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'type_id' => $request->type_id,
        'supplier_id' => $request->supplier_id,
        'imagem' => $request->imagem
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Produto criado com sucesso',
        'data' => $product
    ], 201);
}

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        }

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produto atualizado com sucesso',
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produto excluído com sucesso'
        ]);
    }
}
