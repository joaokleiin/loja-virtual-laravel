@extends('layouts.crud')

@section('title', 'Produtos')

@section('content')
    <div class="space-y-8">
        <!-- Header -->
<div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 shadow-xl border border-white/20">
    <div class="flex flex-col gap-6 md:flex-row md:justify-between md:items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 drop-shadow-sm">Produtos</h1>
            <p class="text-gray-600 mt-2 text-lg">Gerencie os produtos da sua loja</p>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('products.report') }}" class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-sm text-gray-800 font-medium rounded-xl hover:bg-white/30 transition-all duration-300 hover:shadow-xl hover:scale-105 border border-white/30">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6m-9 4h12a2 2 0 002-2V7a2 2 0 00-.586-1.414l-3-3A2 2 0 0016 2H6a2 2 0 00-2 2v15a2 2 0 002 2z"></path>
                </svg>
                Relatório
            </a>

            <a href="{{ url('products/new') }}" class="inline-flex items-center px-6 py-3 bg-blue-600/80 backdrop-blur-sm text-white font-medium rounded-xl hover:bg-blue-700/90 transition-all duration-300 hover:shadow-xl hover:scale-105 border border-white/20">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Novo Produto
            </a>
        </div>
    </div>
</div>

        <!-- Products Table -->
        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl border border-white/20 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[980px] divide-y divide-white/20">
                    <thead class="bg-white/5">
                        <tr>
                            <th class="w-24 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagem</th>
                            <th class="min-w-[220px] px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                            <th class="w-32 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                            <th class="w-32 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                            <th class="w-36 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                            <th class="w-40 px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fornecedor</th>
                            <th class="w-52 px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-transparent divide-y divide-white/10">
                        @foreach($products as $product)
                            @php
                                $placeholderImage = asset('images/produto-padrao.svg');
                                $productImage = $placeholderImage;

                                if ($product->imagem && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->imagem)) {
                                    $productImage = asset('storage/' . $product->imagem);
                                }
                            @endphp

                            <tr class="hover:bg-white/10 transition-all duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img
                                        src="{{ $productImage }}"
                                        alt="{{ $product->name }}"
                                        class="h-16 w-16 rounded-xl border border-white/20 object-cover shadow-md"
                                        onerror="this.onerror=null; this.src='{{ $placeholderImage }}';"
                                    >
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                    @if($product->description)
                                        <div class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    R$ {{ number_format($product->price, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $product->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $product->type->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $product->supplier->name ?? 'N/A' }}
                                </td>
                                <td class="min-w-[13rem] px-6 py-4 text-right text-sm font-medium">
                                    <div class="flex flex-nowrap justify-end gap-3">
                                        <a href="{{ url('/products/update', ['id' => $product->id]) }}" class="inline-flex shrink-0 items-center whitespace-nowrap px-3 py-2 bg-blue-500/20 backdrop-blur-sm text-blue-700 rounded-lg hover:bg-blue-500/30 transition-all duration-300 hover:shadow-md hover:scale-105 border border-blue-300/30">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Editar
                                        </a>
                                        <button onclick="confirmDelete('{{ url('/products/delete', ['id' => $product->id]) }}')" class="inline-flex shrink-0 items-center whitespace-nowrap px-3 py-2 bg-red-500/20 backdrop-blur-sm text-red-700 rounded-lg hover:bg-red-500/30 transition-all duration-300 hover:shadow-md hover:scale-105 border border-red-300/30">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Excluir
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl max-w-md w-full mx-4 border border-white/20">
            <div class="p-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-900">Confirmar exclusão</h3>
                        <p class="mt-3 text-gray-600">Tem certeza de que deseja excluir este produto? Esta ação não pode ser desfeita.</p>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 px-8 py-4 flex justify-end space-x-4 border-t border-white/10">
                <button id="cancelDelete" type="button" class="px-6 py-3 text-sm font-medium text-gray-700 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl hover:bg-white/30 transition-all duration-300">Cancelar</button>
                <a id="confirmDeleteButton" href="#" class="px-6 py-3 text-sm font-medium text-white bg-red-600/80 backdrop-blur-sm border border-red-400/30 rounded-xl hover:bg-red-700/90 transition-all duration-300 hover:shadow-lg">
                    Excluir
                </a>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(url) {
            const modal = document.getElementById('deleteModal');
            const confirmButton = document.getElementById('confirmDeleteButton');
            confirmButton.href = url;
            modal.classList.remove('hidden');
        }

        document.getElementById('cancelDelete').addEventListener('click', () => {
            document.getElementById('deleteModal').classList.add('hidden');
        });
    </script>
@endsection
