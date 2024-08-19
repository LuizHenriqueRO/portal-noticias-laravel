<x-app-layout>
    <x-slot name="header">
        <h2 class="container mx-auto px-4">
            {{ __('Página de Noticias') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                @if ($noticias->isEmpty())
                <p>Não há noticias disponíveis no momento</p>
                @else
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">URL</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noticias as $noticia)
                        <tr>
                            <td scope="row">{{ $noticia->id }}</td>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->descricao }}</td>
                            <td><a href="{{ $noticia->url }}">{{ $noticia->url }}</a></td>
                            <td>
                                <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                    <a href="{{ route('noticias.show', $noticia->id) }}" class="me-2 btn btn-secondary"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('noticias.edit', $noticia->id) }}" class="me-2 btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>