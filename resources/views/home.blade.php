<x-app-layout>
    <x-slot name="header">
        <h2 class="container mx-auto px-4">
            {{ __('Página de Noticias') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        @if (!$ultimasNoticias->isEmpty())
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($ultimasNoticias as $index => $noticia)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($ultimasNoticias as $index => $noticia)
                        <a href="{{ route('noticias.show', $noticia->id) }}">
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ $noticia->url }}" class="d-block w-100" alt="{{ $noticia->titulo }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $noticia->titulo }}</h5>
                                    <p class="white-text">{{ $noticia->descricao }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        @endif
    </div>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12">
                @if ($noticias->isEmpty())
                    <p>Não há notícias disponíveis no momento.</p>
                @else
                    <div class="row">
                        @foreach ($noticias as $noticia)
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('noticias.show', $noticia->id) }}" style="text-decoration: none;">
                                    <div class="card">
                                        <img src="{{ $noticia->url }}" class="card-img-top"
                                            alt="{{ $noticia->titulo }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $noticia->titulo }}</h5>
                                            <p class="card-text">{{ $noticia->descricao }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
