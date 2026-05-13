@extends('layouts.crud')

@section('title', 'Relatório de Produtos')

@section('content')
    <div class="space-y-8">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-xl border border-white/20">
            <div class="flex flex-col gap-2">
                <h1 class="text-4xl font-bold text-gray-900 drop-shadow-sm">
                    Relatório de Produtos
                </h1>
                <p class="text-gray-600 mt-2 text-lg">
                    Use os filtros abaixo para gerar um relatório em PDF dos produtos cadastrados.
                </p>
            </div>
        </div>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-xl border border-white/20">
            <form method="GET" action="{{ route('products.report.pdf') }}" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nome do produto
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ request('name') }}"
                        placeholder="Ex: Mouse, teclado, camiseta..."
                        class="w-full rounded-xl border border-white/20 bg-white/60 px-4 py-3 text-gray-900 placeholder-gray-500 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label for="type_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Tipo de produto
                    </label>

                    <select
                        id="type_id"
                        name="type_id"
                        class="w-full rounded-xl border border-white/20 bg-white/60 px-4 py-3 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >
                        <option value="">Todos os tipos</option>

                        @foreach($types as $type)
                            <option value="{{ $type->id }}" @selected(request('type_id') == $type->id)>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="min_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                            Quantidade mínima
                        </label>

                        <input
                            type="number"
                            id="min_quantity"
                            name="min_quantity"
                            value="{{ request('min_quantity') }}"
                            placeholder="Ex: 1"
                            class="w-full rounded-xl border border-white/20 bg-white/60 px-4 py-3 text-gray-900 placeholder-gray-500 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label for="max_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                            Quantidade máxima
                        </label>

                        <input
                            type="number"
                            id="max_quantity"
                            name="max_quantity"
                            value="{{ request('max_quantity') }}"
                            placeholder="Ex: 100"
                            class="w-full rounded-xl border border-white/20 bg-white/60 px-4 py-3 text-gray-900 placeholder-gray-500 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-4">
                    <button
                        type="submit"
                        class="inline-flex items-center px-6 py-3 bg-blue-600/80 backdrop-blur-sm text-white font-medium rounded-xl hover:bg-blue-700/90 transition-all duration-300 hover:shadow-xl hover:scale-105 border border-white/20"
                    >
                        Exportar PDF
                    </button>

                    <a
                        href="{{ url('/products') }}"
                        class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-sm text-gray-800 font-medium rounded-xl hover:bg-white/30 transition-all duration-300 hover:shadow-xl hover:scale-105 border border-white/30"
                    >
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection