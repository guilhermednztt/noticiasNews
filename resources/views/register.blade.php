<x-style></x-style>

<body class="bg-gray-300">
    <div class="gap-4 mt-8 mx-auto mt-8 w-80 h-64 bg-white h-full flex justify-center items-center">
        <div class="p-4">
        </div>
        <div class="p-4">
            <h2 class="text-base font-bold">Registrar <span class="text-red-700">conta</span></h2>
            <form method="POST" action="/registrar">
                @csrf
                <input type="email" name="email" placeholder="E-mail" maxlength="60" required>
                <input type="password" name="senha" placeholder="Senha" maxlength="20" required>
                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>
</body>
<x-footer></x-footer>