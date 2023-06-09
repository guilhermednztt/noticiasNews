<!-- 
    CONTEUDO PARA VER A MATERIA INDIVIDUALMENTE
 -->

<x-layout titulo="News">

    <div class="grid py-10">
        <h1 class="text-3xl">{{ $materia['titulo'] }}</h1>

        <p class="text-xs">Por
            <span class="text-red-700">{{ $materia['autor'] }}</span>
            - {{ $materia['dataPost'] }}
        </p>

        <div class="imagemNews py-3 w-1032 h-100 overflow-hidden">
            <img src="{{ asset('images/' . $materia['imagem']) }}" class="w-full h-full object-cover">
        </div>
        <p class="text-base">
            {!! $materia['conteudo'] !!}
        </p>
    </div>

    <!-- SUGESTAO DE MATERIA -->
    <div class="grid grid-cols-4 gap-4 pt-10 pb-3">
        @for ($i = 0; $i < 4; $i++)
        <div class="p-4">
            <div class="h-72">
                <button class="text-8xl/text-2xl text-white bg-red-700 rounded-lg px-2 py-1">{{ $sugestao[$i]['categoria'] }}</button>
                <br>
                <a href="{{ url('/materias/' . $sugestao[$i]['id_materia']) }}">
                    <label class="text-base pb-3 pt-2">
                        {{ $sugestao[$i]['titulo'] }}
                    </label>
                </a>
                <p class="text-xs">Por
                    <span class="text-red-700">{{ $sugestao[$i]['autor'] }}</span>
                    - {{ $sugestao[$i]['dataPost'] }}
                </p>
            </div>
        </div>
        @endfor
    </div>



</x-layout>