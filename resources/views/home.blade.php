<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-stone-50 text-slate-900">
    {{-- Navbar publica da loja com atalhos para autenticacao do Breeze. --}}
    <header class="border-b border-slate-200 bg-white">
        <nav class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-600 text-lg font-bold text-white">LV</span>
                <span>
                    <span class="block text-lg font-bold leading-tight">Loja Virtual</span>
                    <span class="block text-sm text-slate-500">Produtos disponiveis</span>
                </span>
            </a>

            <div class="flex flex-wrap items-center gap-3">
                @auth
                    <span class="text-sm text-slate-600">Ola, {{ Auth::user()->name }}</span>

                    <a href="{{ url('/dashboard') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        Dashboard
                    </a>

                    @if (Route::has('profile.edit'))
                        <a href="{{ route('profile.edit') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                            Perfil
                        </a>
                    @endif

                    @if (Route::has('logout'))
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-700">
                                Sair
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        Login
                    </a>

                    <a href="{{ Route::has('register') ? route('register') : url('/register') }}" class="rounded-md bg-emerald-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-emerald-700">
                        Registrar
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <section class="bg-slate-900 text-white">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 lg:grid-cols-[1.2fr_0.8fr] lg:px-8">
                <div class="flex flex-col justify-center">
                    <p class="text-sm font-semibold uppercase tracking-wide text-emerald-300">Vitrine da loja</p>
                    <h1 class="mt-3 max-w-2xl text-3xl font-bold sm:text-4xl">Produtos cadastrados e disponiveis para venda</h1>
                    <p class="mt-4 max-w-2xl text-base text-slate-300">
                        Confira os itens em estoque e filtre por tipo de produto para encontrar o que procura.
                    </p>
                </div>

                <div class="overflow-hidden rounded-lg border border-slate-700 bg-slate-800">
                    <img src="{{ asset('images/images.jpg') }}" alt="Capa da Loja Virtual" class="h-56 w-full object-cover">
                </div>
            </div>
        </section>

        <section class="border-b border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{-- Filtros por tipo de produto. --}}
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Produtos</h2>
                        <p class="text-sm text-slate-500">{{ $products->count() }} produto(s) encontrado(s)</p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="{{ url('/') }}" class="{{ empty($selectedTypeId) ? 'bg-emerald-600 text-white' : 'border border-slate-300 text-slate-700 hover:bg-slate-100' }} rounded-md px-4 py-2 text-sm font-medium transition">
                            Todos
                        </a>

                        @foreach ($types as $type)
                            <a href="{{ url('/?type_id=' . $type->id) }}" class="{{ (string) $selectedTypeId === (string) $type->id ? 'bg-emerald-600 text-white' : 'border border-slate-300 text-slate-700 hover:bg-slate-100' }} rounded-md px-4 py-2 text-sm font-medium transition">
                                {{ $type->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if ($products->count() > 0)
                {{-- Cards dos produtos disponiveis. --}}
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <article class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            @if ($product->imagem)
                                <img src="{{ asset('storage/' . $product->imagem) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
                            @else
                                <div class="flex h-48 w-full items-center justify-center bg-gradient-to-br from-emerald-100 via-white to-amber-100">
                                    <span class="text-5xl font-bold text-emerald-700">{{ mb_substr($product->name, 0, 1) }}</span>
                                </div>
                            @endif

                            <div class="space-y-4 p-5">
                                <div>
                                    <span class="inline-flex rounded-md bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800">
                                        {{ $product->type->name ?? 'Sem tipo' }}
                                    </span>
                                    <h3 class="mt-3 text-lg font-semibold text-slate-900">{{ $product->name }}</h3>
                                    @if ($product->description)
                                        <p class="mt-2 text-sm leading-6 text-slate-600">
                                            {{ \Illuminate\Support\Str::limit($product->description, 95) }}
                                        </p>
                                    @endif
                                </div>

                                <div class="flex items-end justify-between border-t border-slate-100 pt-4">
                                    <div>
                                        <p class="text-sm text-slate-500">Preco</p>
                                        <p class="text-xl font-bold text-emerald-700">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm text-slate-500">Estoque</p>
                                        <p class="font-semibold text-slate-800">{{ $product->quantity }} un.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="rounded-lg border border-dashed border-slate-300 bg-white p-10 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">Nenhum produto disponivel</h3>
                    <p class="mt-2 text-sm text-slate-500">Cadastre produtos com preco e quantidade maiores que zero.</p>
                </div>
            @endif
        </section>
    </main>
</body>

</html>
