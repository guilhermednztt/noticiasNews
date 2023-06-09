<!-- 
    PAGINA INICIAL (HOME)
 -->

<x-layout titulo="News">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

        <!-- ESQUERDA -->
        <div class="p-4">
            <div class="news pb-10 w-500 h-230 overflow-hidden" id="principal_news">
                <button class="text-8xl/text-2xl text-white bg-red-700 rounded-lg px-2 py-1">{{ $materias[0]['categoria'] }}</button>
                <br>
                <a href="{{ url('/materias/' . $materias[0]['id_materia']) }}">
                    <label class="text-4xl w-504 pb-3">
                        <b>{{ $materias[0]['titulo'] }}</b>
                    </label>
                    <img src="{{ asset('images/' . $materias[0]['imagem']) }}" class="w-full h-full object-cover">
                </a>
            </div>

            <div class="news flex" id="news">
                <div class="h-72 pr-5 w-1/2">
                    <button class="text-8xl/text-2xl text-white bg-red-700 rounded-lg px-2 py-1">{{ $materias[1]['categoria'] }}</button>
                    <br>
                    <a href="{{ url('/materias/' . $materias[1]['id_materia']) }}">
                        <label class="text-base pb-3 pt-2">
                            {{ $materias[1]['titulo'] }}
                        </label>
                        <p class="text-xs">Por
                            <span class="text-red-700">{{ $materias[1]['autor'] }}</span>
                            - {{ $materias[1]['dataPost'] }}
                        </p>
                    </a>
                </div>
                <div class="h-72 w-1/2 ml-auto">
                    <button class="text-8xl/text-2xl text-white bg-red-700 rounded-lg px-2 py-1">{{ $materias[2]['categoria'] }}</button>
                    <br>
                    <a href="{{ url('/materias/' . $materias[2]['id_materia']) }}">
                        <label class="text-base pb-3 pt-2">
                            {{ $materias[2]['titulo'] }}
                        </label>
                        <p class="text-xs">Por
                            <span class="text-red-700">{{ $materias[2]['autor'] }}</span>
                            - {{ $materias[2]['dataPost'] }}
                        </p>
                    </a>
                </div>
            </div>

            <div class="pt-3">
                <a href="{{ url('/vermais') }}">
                    <button class="text-xl/text-7xl text-white bg-black rounded-lg w-full px-16 py-2">Ver mais <i class="ph ph-caret-double-right"></i></button>
                </a>
            </div>
        </div>

        <!-- DIREITA -->
        <div class="p-4">
            @for ($i = 3; $i <= 8; $i++) <div class="flex items-center pb-4">
                <div class="pr-3 w-180 h-115 overflow-hidden">
                    <img src="{{ asset('images/' . $materias[$i]['imagem']) }}" class="w-full h-full object-cover">
                </div>
                <div class="content">
                    <button class="text-8xl/text-2xl text-white bg-red-700 rounded-lg px-2 py-1">{{ $materias[$i]['categoria'] }}</button>
                    <a href="{{ url('/materias/' . $materias[$i]['id_materia']) }}">
                        <label class="text-base">{{ $materias[$i]['titulo'] }}</label>
                        <p class="text-xs">Por
                            <span class="text-red-700">{{ $materias[$i]['autor'] }}</span>
                            - {{ $materias[$i]['dataPost'] }}
                        </p>
                    </a>
                </div>
        </div>
        @endfor
    </div>
    </div>


</x-layout>