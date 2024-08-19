<x-app-layout>
    <x-slot name="header">
        <h2 class="container mx-auto px-4">
            {{ __('Editar Notícia') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mb-4 px-4">
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('noticias.update', $noticia) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="ititulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="ititulo" name="titulo" value="{{ $noticia->titulo }}">
            </div>
            <div class="mb-3">
                <label for="idescricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="idescricao" name="descricao" rows="3">{{ $noticia->descricao }}</textarea>
            </div>
            <div class="mb-3">
                <label for="iarquivo" class="form-label">Arquivo</label>
                <input class="form-control" type="file" id="iarquivo" name="arquivo">
            </div>
            <button class="btn btn-primary">Editar Notícia</button>
        </form>
    </div>
</x-app-layout>