<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>

    <script>
        // Aplica o tema salvo antes da pagina carregar.
        (function () {
            const savedTheme = localStorage.getItem('loja-theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite('resources/css/app.css')

    <style>
        :root {
            --page-bg: #f8fafc;
            --surface: #ffffff;
            --surface-soft: #f1f5f9;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --primary: #059669;
            --primary-hover: #047857;
            --accent: #2563eb;
            --hero-start: #0f172a;
            --hero-mid: #14532d;
            --hero-end: #1e3a8a;
        }

        .dark {
            --page-bg: #020617;
            --surface: #0f172a;
            --surface-soft: #1e293b;
            --text: #f8fafc;
            --muted: #cbd5e1;
            --border: #334155;
            --primary: #22c55e;
            --primary-hover: #16a34a;
            --accent: #60a5fa;
            --hero-start: #020617;
            --hero-mid: #172554;
            --hero-end: #064e3b;
        }

        body {
            background: var(--page-bg);
            color: var(--text);
            transition: background-color 0.25s ease, color 0.25s ease;
        }

        .store-surface {
            background: var(--surface);
            border-color: var(--border);
            color: var(--text);
        }

        .store-soft {
            background: var(--surface-soft);
            border-color: var(--border);
        }

        .store-muted {
            color: var(--muted);
        }

        .store-hero {
            background:
                radial-gradient(circle at top right, rgba(34, 197, 94, 0.26), transparent 32rem),
                linear-gradient(135deg, var(--hero-start), var(--hero-mid), var(--hero-end));
        }

        .category-link {
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
        }

        .category-link:hover,
        .category-link-active {
            border-color: var(--primary);
            background: var(--primary);
            color: #ffffff;
        }

        .product-card {
            background: var(--surface);
            border-color: var(--border);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: rgba(5, 150, 105, 0.65);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.14);
        }

        .product-image {
            height: 13rem;
            width: 100%;
            object-fit: cover;
            background: var(--surface-soft);
        }

        .dark .product-card:hover {
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
        }

        .store-button {
            background: var(--primary);
            color: #ffffff;
        }

        .store-button:hover {
            background: var(--primary-hover);
        }

        .ghost-button {
            border: 1px solid var(--border);
            color: var(--text);
        }

        .ghost-button:hover {
            background: var(--surface-soft);
        }

        .theme-switch {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 88px;
            height: 42px;
            padding: 4px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: linear-gradient(135deg, #dbeafe, #fef3c7);
            box-shadow: inset 0 1px 3px rgba(15, 23, 42, 0.12);
            transition: background 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .theme-switch:hover {
            box-shadow: inset 0 1px 3px rgba(15, 23, 42, 0.12), 0 8px 20px rgba(15, 23, 42, 0.14);
        }

        .theme-thumb {
            position: absolute;
            left: 4px;
            z-index: 1;
            width: 34px;
            height: 34px;
            border-radius: 999px;
            background: #ffffff;
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.2);
            transition: transform 0.25s ease, background-color 0.25s ease;
        }

        .theme-icon {
            position: relative;
            z-index: 2;
            display: flex;
            width: 34px;
            height: 34px;
            align-items: center;
            justify-content: center;
            transition: color 0.25s ease, transform 0.25s ease, opacity 0.25s ease;
        }

        .theme-sun {
            color: #f59e0b;
            transform: scale(1.06);
        }

        .theme-moon {
            color: #64748b;
            opacity: 0.58;
        }

        .dark .theme-switch {
            background: linear-gradient(135deg, #0f172a, #312e81);
            border-color: #475569;
        }

        .dark .theme-thumb {
            transform: translateX(46px);
            background: #1e293b;
        }

        .dark .theme-sun {
            color: #94a3b8;
            opacity: 0.58;
            transform: scale(1);
        }

        .dark .theme-moon {
            color: #bfdbfe;
            opacity: 1;
            transform: scale(1.06);
        }
    </style>
</head>

<body class="min-h-screen font-sans antialiased">
    {{-- Navbar da vitrine com links padrao do Breeze. --}}
    <header class="sticky top-0 z-40 border-b backdrop-blur-xl store-surface">
        <nav class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-600 text-lg font-black text-white shadow-sm">LV</span>
                <span>
                    <span class="block text-xl font-black tracking-tight">Loja Virtual</span>
                    <span class="block text-sm store-muted">Explore nossa loja</span>
                </span>
            </a>

            <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                <button id="theme-toggle" type="button" class="theme-switch" aria-label="Alternar tema" aria-pressed="false">
                    <span class="theme-thumb" aria-hidden="true"></span>
                    <span class="theme-icon theme-sun" aria-hidden="true">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                        </svg>
                    </span>
                    <span class="theme-icon theme-moon" aria-hidden="true">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                    </span>
                    <span id="theme-toggle-text" class="sr-only">Tema escuro</span>
                </button>

                @auth
                    <span class="rounded-lg px-3 py-2 text-sm font-medium store-soft store-muted">
                        Ola, {{ Auth::user()->name }}
                    </span>

                    <a href="{{ url('/dashboard') }}" class="rounded-lg px-4 py-2 text-sm font-semibold transition ghost-button">
                        Dashboard
                    </a>

                    <a href="{{ route('profile.edit') }}" class="rounded-lg px-4 py-2 text-sm font-semibold transition ghost-button">
                        Perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg px-4 py-2 text-sm font-semibold transition store-button">
                            Sair
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="rounded-lg px-4 py-2 text-sm font-semibold transition ghost-button">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="rounded-lg px-4 py-2 text-sm font-semibold transition store-button">
                        Registrar
                    </a>
                @endguest
            </div>
        </nav>
    </header>

    <main>
        {{-- Hero principal da loja. --}}
        <section class="store-hero text-white">
            <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.15fr_0.85fr] lg:px-8 lg:py-20">
                <div class="flex flex-col justify-center">
                    <span class="w-fit rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-sm font-semibold text-emerald-100 backdrop-blur">
                        Compre com praticidade e seguranca
                    </span>

                    <h1 class="mt-6 max-w-3xl text-4xl font-black leading-tight tracking-tight sm:text-5xl lg:text-6xl">
                        Encontre os melhores produtos em um so lugar
                    </h1>

                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-200">
                        Confira ofertas, novidades e produtos selecionados para voce. Escolha uma categoria e veja os itens disponiveis para venda.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="#produtos" class="rounded-xl bg-white px-6 py-3 text-sm font-bold text-slate-900 shadow-lg transition hover:bg-slate-100">
                            Ver produtos
                        </a>
                        <span class="rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-slate-100 backdrop-blur">
                            {{ $products->count() }} oferta(s) disponivel(is)
                        </span>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-4 rounded-3xl bg-white/10 blur-2xl"></div>
                    <div class="relative overflow-hidden rounded-3xl border border-white/20 bg-white/10 p-3 shadow-2xl backdrop-blur">
                        <img src="{{ asset('images/images.jpg') }}" alt="Capa da Loja Virtual" class="h-72 w-full rounded-2xl object-cover sm:h-80">
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div class="rounded-2xl bg-white/10 p-4">
                                <p class="text-sm text-slate-200">Produtos em destaque</p>
                                <p class="mt-1 text-2xl font-black">{{ $products->count() }}</p>
                            </div>
                            <div class="rounded-2xl bg-white/10 p-4">
                                <p class="text-sm text-slate-200">Categorias</p>
                                <p class="mt-1 text-2xl font-black">{{ $types->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="produtos" class="border-b px-4 py-8 sm:px-6 lg:px-8" style="border-color: var(--border);">
            <div class="mx-auto max-w-7xl">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-wide" style="color: var(--primary);">Escolha uma categoria</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight">Produtos em destaque</h2>
                        <p class="mt-2 store-muted">
                            Confira nossos produtos e ofertas disponiveis na loja.
                        </p>
                    </div>

                    <div class="rounded-2xl border p-2 store-soft">
                        {{-- Filtros por tipo mantendo a mesma query type_id. --}}
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ url('/') }}#produtos" class="{{ empty($selectedTypeId) ? 'category-link-active' : 'category-link' }} rounded-xl px-4 py-2 text-sm font-bold transition">
                                Todos os produtos
                            </a>

                            @foreach ($types as $type)
                                <a href="{{ url('/?type_id=' . $type->id) }}#produtos" class="{{ (string) $selectedTypeId === (string) $type->id ? 'category-link-active' : 'category-link' }} rounded-xl px-4 py-2 text-sm font-bold transition">
                                    {{ $type->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            @if ($products->count() > 0)
                {{-- Cards visuais dos produtos disponiveis. --}}
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        @php
                            $typeName = \Illuminate\Support\Str::lower($product->type->name ?? '');
                            $placeholderImage = 'images/produtos/produto-padrao.svg';

                            if (\Illuminate\Support\Str::contains($typeName, ['eletron', 'informat', 'tecnolog', 'celular', 'comput', 'notebook'])) {
                                $placeholderImage = 'images/produtos/tecnologia.svg';
                            } elseif (\Illuminate\Support\Str::contains($typeName, ['moda', 'roupa', 'calcado', 'tenis', 'acessorio'])) {
                                $placeholderImage = 'images/produtos/moda.svg';
                            } elseif (\Illuminate\Support\Str::contains($typeName, ['alimento', 'bebida', 'mercado', 'comida'])) {
                                $placeholderImage = 'images/produtos/alimentos.svg';
                            } elseif (\Illuminate\Support\Str::contains($typeName, ['casa', 'decor', 'moveis', 'utilidade'])) {
                                $placeholderImage = 'images/produtos/casa.svg';
                            }

                            $productImage = $product->imagem ? asset('storage/' . $product->imagem) : asset($placeholderImage);
                        @endphp

                        <article class="product-card flex overflow-hidden rounded-2xl border shadow-sm">
                            <div class="flex w-full flex-col">
                                <img src="{{ $productImage }}" alt="{{ $product->name }}" class="product-image">

                                <div class="flex flex-1 flex-col p-5">
                                    <div class="mb-3 flex items-center justify-between gap-3">
                                        <span class="rounded-full px-3 py-1 text-xs font-bold" style="background: rgba(5, 150, 105, 0.12); color: var(--primary);">
                                            {{ $product->type->name ?? 'Sem tipo' }}
                                        </span>
                                        <span class="rounded-full px-3 py-1 text-xs font-semibold store-soft store-muted">
                                            Produto disponivel
                                        </span>
                                    </div>

                                    <h3 class="text-lg font-black leading-snug">{{ $product->name }}</h3>

                                    <p class="mt-2 min-h-12 text-sm leading-6 store-muted">
                                        {{ $product->description ? \Illuminate\Support\Str::limit($product->description, 88) : 'Produto disponivel para venda em nossa loja virtual.' }}
                                    </p>

                                    <div class="mt-5 flex items-end justify-between gap-4 border-t pt-4" style="border-color: var(--border);">
                                        <div>
                                            <p class="text-xs font-bold uppercase tracking-wide store-muted">Preco</p>
                                            <p class="text-2xl font-black" style="color: var(--primary);">
                                                R$ {{ number_format($product->price, 2, ',', '.') }}
                                            </p>
                                        </div>

                                        <div class="text-right">
                                            <p class="text-xs font-bold uppercase tracking-wide store-muted">Estoque disponivel</p>
                                            <p class="text-sm font-bold">{{ $product->quantity }} un.</p>
                                        </div>
                                    </div>

                                    <button type="button" class="mt-5 w-full rounded-xl px-4 py-3 text-sm font-bold transition store-button">
                                        Comprar agora
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="rounded-2xl border border-dashed p-12 text-center store-surface">
                    <p class="text-sm font-bold uppercase tracking-wide" style="color: var(--primary);">Ofertas disponiveis</p>
                    <h3 class="mt-3 text-2xl font-black">Nenhum produto encontrado para esta categoria</h3>
                    <p class="mt-3 store-muted">
                        Volte para "Todos os produtos" ou cadastre novos produtos com preco e estoque disponivel.
                    </p>
                </div>
            @endif
        </section>
    </main>

    <script>
        // Botao de alternancia entre modo claro e escuro com localStorage.
        const themeToggle = document.getElementById('theme-toggle');
        const themeToggleText = document.getElementById('theme-toggle-text');

        function updateThemeButton() {
            const isDark = document.documentElement.classList.contains('dark');
            themeToggleText.textContent = isDark ? 'Tema claro' : 'Tema escuro';
            themeToggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
            themeToggle.setAttribute('aria-label', isDark ? 'Alternar para tema claro' : 'Alternar para tema escuro');
        }

        themeToggle.addEventListener('click', function () {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('loja-theme', isDark ? 'dark' : 'light');
            updateThemeButton();
        });

        updateThemeButton();
    </script>
</body>

</html>
