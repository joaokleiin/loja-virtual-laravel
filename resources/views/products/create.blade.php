@extends('layouts.crud')

@section('title', 'Novo Produto')

@section('content')
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-xl border border-white/20 mb-8">
            <h1 class="text-4xl font-bold text-gray-900 drop-shadow-sm">Novo Produto</h1>
            <p class="text-gray-600 mt-2 text-lg">Adicione um novo produto ao catálogo</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8">
            <form action="{{ url('products/new') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-800 mb-3">Nome do Produto</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300"
                        placeholder="Digite o nome do produto"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-800 mb-3">Descrição</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300"
                        placeholder="Descrição opcional do produto"
                    >{{ old('description') }}</textarea>
                </div>

                <!-- Quantity and Price Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label for="quantity" class="block text-sm font-semibold text-gray-800 mb-3">Quantidade</label>
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            value="{{ old('quantity') }}"
                            min="0"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300"
                            placeholder="0"
                        >
                        @error('quantity')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-800 mb-3">Preço (R$)</label>
                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            step="0.01"
                            class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300"
                            placeholder="0.00"
                        >
                        @error('price')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Type -->
                <div>
                    <label for="type_id" class="block text-sm font-semibold text-gray-800 mb-3">Tipo</label>
                    <select
                        id="type_id"
                        name="type_id"
                        class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300"
                    >
                        <option value="">Selecione um tipo</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Supplier -->
                <div>
                    <label for="supplier_id" class="block text-sm font-semibold text-gray-800 mb-3">Fornecedor</label>
                    <select
                        id="supplier_id"
                        name="supplier_id"
                        class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300"
                    >
                        <option value="">Selecione um fornecedor</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label for="imagem" class="block text-sm font-semibold text-gray-800 mb-3">Imagem do Produto</label>
                    <input
                        type="file"
                        id="imagem"
                        name="imagem"
                        accept="image/*"
                        class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400/50 focus:border-blue-400 backdrop-blur-sm transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    >
                    @error('imagem')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-4 pt-8 border-t border-white/10">
                    <a href="{{ url('products') }}" class="px-6 py-3 text-sm font-medium text-gray-700 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl hover:bg-white/30 transition-all duration-300 hover:shadow-lg">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-blue-600/80 backdrop-blur-sm border border-blue-400/30 rounded-xl hover:bg-blue-700/90 transition-all duration-300 hover:shadow-xl hover:scale-105">
                        Criar Produto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
