<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $selectedTypeId = $request->query('type_id');
        $types = Type::orderBy('name')->get();

        // Busca somente produtos disponiveis para venda na vitrine.
        $productsQuery = Product::with('type')
            ->where('price', '>', 0)
            ->where('quantity', '>', 0);

        // Aplica o filtro por tipo quando o usuario seleciona uma categoria.
        if ($selectedTypeId) {
            $productsQuery->where('type_id', $selectedTypeId);
        }

        $products = $productsQuery
            ->orderBy('name')
            ->get();

        return view('home', [
            'products' => $products,
            'types' => $types,
            'selectedTypeId' => $selectedTypeId,
        ]);
    }
}
