<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Loja Virtual')</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/heroicons@2.0.18/24/outline"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white/10 backdrop-blur-md border border-white/20 shadow-xl rounded-r-2xl">
            <div class="p-6">
                <h1 class="text-xl font-semibold text-gray-800 drop-shadow-sm">Loja Virtual</h1>
            </div>
            <nav class="px-4 space-y-2">
                <a href="{{ url('/') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-xl hover:bg-white/20 hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ url('products') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-xl hover:bg-white/20 hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Produtos
                </a>
                <a href="{{ url('types') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-xl hover:bg-white/20 hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Tipos
                </a>
                <a href="{{ url('suppliers') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-xl hover:bg-white/20 hover:text-gray-900 transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Fornecedores
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-8">
            <div class="max-w-7xl mx-auto bg-white/5 backdrop-blur-sm rounded-2xl p-8 shadow-2xl border border-white/10">
                @if(session('success') || session('error'))
                    <div class="mb-6 space-y-3">
                        @if(session('success'))
                            <div class="rounded-xl bg-green-50/80 backdrop-blur-sm border border-green-200/50 p-4 text-sm text-green-800 shadow-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="rounded-xl bg-red-50/80 backdrop-blur-sm border border-red-200/50 p-4 text-sm text-red-800 shadow-lg">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>