@extends('layouts.crud')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Header -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-xl border border-white/20">
            <h1 class="text-4xl font-bold text-gray-900 drop-shadow-sm">Dashboard</h1>
            <p class="text-gray-600 mt-2 text-lg">Visão geral do seu sistema de gestão</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Products Card -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8 hover:bg-white/20 transition-all duration-300 hover:shadow-2xl hover:scale-105">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-semibold text-gray-900">Produtos</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Product::count() }}</p>
                        <p class="text-sm text-gray-600">Total cadastrados</p>
                    </div>
                </div>
            </div>

            <!-- Types Card -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8 hover:bg-white/20 transition-all duration-300 hover:shadow-2xl hover:scale-105">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-semibold text-gray-900">Tipos</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Type::count() }}</p>
                        <p class="text-sm text-gray-600">Categorias disponíveis</p>
                    </div>
                </div>
            </div>

            <!-- Suppliers Card -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8 hover:bg-white/20 transition-all duration-300 hover:shadow-2xl hover:scale-105">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-semibold text-gray-900">Fornecedores</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Supplier::count() }}</p>
                        <p class="text-sm text-gray-600">Parceiros ativos</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-900">Produtos Recentes</h2>
                <a href="{{ url('products') }}" class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors">Ver todos</a>
            </div>

            @if(\App\Models\Product::count() > 0)
                <div class="space-y-6">
                    @foreach(\App\Models\Product::latest()->take(5)->get() as $product)
                        <div class="flex items-center justify-between py-4 border-b border-white/10 last:border-b-0 hover:bg-white/5 rounded-lg px-4 transition-all duration-200">
                            <div class="flex items-center">
                                @if($product->imagem)
                                    <img src="{{ asset('storage/' . $product->imagem) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-xl border border-white/20 mr-4 shadow-md">
                                @else
                                    <div class="w-12 h-12 bg-gray-200/50 rounded-xl flex items-center justify-center mr-4 border border-white/20 shadow-md backdrop-blur-sm">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $product->type->name ?? 'Sem tipo' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-semibold text-gray-900">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                                <p class="text-sm text-gray-600">{{ $product->quantity }} un.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Nenhum produto</h3>
                    <p class="mt-2 text-gray-600">Comece cadastrando seus primeiros produtos.</p>
                    <div class="mt-8">
                        <a href="{{ url('products/new') }}" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-blue-600/80 backdrop-blur-sm hover:bg-blue-700/90 transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Cadastrar Produto
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection