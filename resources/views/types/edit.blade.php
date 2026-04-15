@extends('layouts.crud')

@section('title', 'Editar Tipo')

@section('content')
    <div class="max-w-md mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Editar Tipo</h1>
            <p class="text-gray-600 mt-1">Atualize as informações do tipo</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ url('types/update') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="id" value="{{ $type->id }}">

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome do Tipo</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $type->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Digite o nome do tipo"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ url('types') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 transition-colors">
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection