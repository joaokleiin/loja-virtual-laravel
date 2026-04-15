<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string'
        ]);
        
        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/suppliers')->with('success', 'Fornecedor salvo com sucesso!');
    }

    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::withCount('products')->get()
        ]);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/suppliers')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return redirect('/suppliers')->with('error', 'Fornecedor não encontrado.');
        }

        if ($supplier->products()->exists()) {
            return redirect('/suppliers')->with('error', 'Não é possível excluir este fornecedor porque ele possui produtos vinculados.');
        }

        try {
            $supplier->delete();
        } catch (QueryException $e) {
            return redirect('/suppliers')->with('error', 'Não foi possível excluir o fornecedor. Verifique se há registros vinculados a ele.');
        }

        return redirect('/suppliers')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
