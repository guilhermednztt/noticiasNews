<!-- 
    LISTAR AS MATERIAS AO CLICAR EM VER MAIS
 -->

<x-layout titulo="News">


    <div class="grid">
        <div class="p-4">
            @for ($i = 0; $i < $total; $i++) <div class="flex items-center pb-4">
                <div class="pr-3 w-180 h-115 overflow-hidden">
                    <img src="{{ asset('images/' . $materias[$i]['imagem']) }}" class="w-full h-full object-cover">
                </div>
                <div class="content">
                    <button class="text-8xl/text-2xl text-white bg-red-700 rounded-lg px-2 py-1">{{ $materias[$i]['categoria'] }}</button>
                    <br>
                    <a href="{{ url('/materias/' . $materias[$i]['id_materia']) }}">
                        <label class="text-2xl font-bold">{{ $materias[$i]['titulo'] }}</label>
                    </a>
                    <p class="text-xs">Por
                        <span class="text-red-700">{{ $materias[$i]['autor'] }}</span>
                        - {{ $materias[$i]['dataPost'] }}
                    </p>
                </div>
        </div>
        @endfor

    </div>
    </div>

</x-layout>