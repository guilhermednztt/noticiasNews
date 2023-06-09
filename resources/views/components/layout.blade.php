<x-style></x-style>

<head>
    <title>{{ $titulo }}</title>
</head>

<body>

    <div class="w-full">
        <div class="container">
            @if (Session::has('login'))
            <nav class="navbar bg-violet-50">
                <div class="container-fluid">
                    <a class="navbar-brand poppins" href="{{ url('/news') }}">
                        <span class="text-gray-700 text-base/text-9xl">notícias</span><span class="text-red-600 font-bold">NEWS</span>
                    </a>
                    <div class="d-flex">
                        <a href="{{ url('/sair') }}" class="pr-3">
                            <button class="text-base/text-8xl text-white bg-black rounded-lg w-36 h-9">Sair <i class="ph ph-sign-in"></i></button>
                        </a>
                    </div>
                </div>
            </nav>
            @else
            <nav class="navbar bg-violet-50">
                <div class="container-fluid">
                    <a class="navbar-brand poppins" href="{{ url('/news') }}">
                        <span class="text-gray-700 text-base/text-9xl">notícias</span><span class="text-red-600 font-bold">NEWS</span>
                    </a>
                    <div class="d-flex">
                        <a href="{{ url('/login') }}" class="pr-3">
                            <button class="text-base/text-8xl text-white bg-black rounded-lg w-36 h-9">Acessar Conta <i class="ph ph-sign-in"></i></button>
                        </a>
                        <a href="{{ url('/registro') }}">
                            <button class="text-xl/text-7xl text-white bg-black rounded-lg w-36 h-9">Registrar-se <i class="ph ph-user-plus"></i></button>
                        </a>
                    </div>
                </div>
            </nav>
            @endif

            <div class="container">
                {{ $slot }}
            </div>

            <!-- FOOTER (BLADE) -->
            <x-footer></x-footer>

        </div>
    </div>
</body>

</html>