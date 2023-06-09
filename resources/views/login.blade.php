<x-style></x-style>
<body class="bg-gray-300">
    <div class="gap-4 mt-8 mx-auto mt-8 w-80 h-64 bg-white h-full flex justify-center items-center">
        <div class="p-4">
        </div>
        <div class="p-4">
            <h2 class="font-bold">Acesse <span class="text-red-700">sua conta!</span></h2>
            <form method="POST" action="/acesso">
                @csrf
                <input type="text" name="login" placeholder="Entre com seu e-mail" maxlength="60" required><br>
                <input type="password" name="senha" placeholder="Entre com sua senha" maxlength="20" required><br>
                <input type="submit" value="Entrar">
            </form>
        </div>
</div>
</body>
<x-footer></x-footer>