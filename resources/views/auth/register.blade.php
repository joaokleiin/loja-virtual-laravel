<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Loja Virtual</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-stone-50 text-slate-900">
    <main class="mx-auto flex min-h-screen max-w-md flex-col justify-center px-4">
        <a href="{{ route('home') }}" class="mb-8 text-center text-2xl font-bold text-emerald-700">Loja Virtual</a>

        <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="text-2xl font-bold">Registrar</h1>
            <p class="mt-1 text-sm text-slate-500">Crie sua conta para acessar o sistema.</p>

            @if ($errors->any())
                <div class="mt-4 rounded-md border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">Nome</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">E-mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Senha</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirmar senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200">
                </div>

                <button type="submit" class="w-full rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">
                    Registrar
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                Ja tem conta?
                <a href="{{ route('login') }}" class="font-medium text-emerald-700 hover:text-emerald-800">Entrar</a>
            </p>
        </section>
    </main>
</body>

</html>
