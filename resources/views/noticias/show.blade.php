<x-app-layout>
    <x-slot name="header">
        <h2 class="container mx-auto mb-4 px-4">
            {{ $noticia->titulo }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div>
            {{ $noticia->titulo }}
        </div>

        
        <div>
            {{ $noticia->descricao }}
        </div>
        <div>
            @if ($noticia->url)
                <img src="{{ asset($noticia->url) }}" alt="{{ $noticia->titulo }}">
            @endif
        </div> 
    </div>
</x-app-layout>