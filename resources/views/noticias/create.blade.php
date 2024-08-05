<x-app-layout>
    <x-slot name="header">
        <h2 class="container mx-auto px-4">
            {{ __('Criar Notícia') }}
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

        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="ititulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="ititulo" name="titulo">
            </div>
            <div class="mb-3">
                <label for="idescricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="idescricao" name="descricao" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="iarquivo" class="form-label">Arquivo</label>
                <input class="form-control" type="file" id="iarquivo" name="arquivo">
            </div>
            <button class="btn btn-primary">Criar Notícia</button>
        </form>
    </div>
</x-app-layout>