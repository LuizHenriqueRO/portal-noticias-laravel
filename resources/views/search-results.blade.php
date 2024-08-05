<x-app-layout tittle="Resultado da Busca">
    @if($noticias->isNotEmpty())
        <h2>Resultados da busca para "{{ request('query') }}"</h2>
        @foreach($noticias as $noticia)
            <div>
                <h1>{{ $noticia->titulo }}</h1>
                <p>{{ $noticia->descricao }}</p>
            </div>
        @endforeach
    @else
        <h2>Nenhum resultado encontado para "{{ request('query') }}"</h2>
    @endif
</x-app-layout>