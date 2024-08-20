@include('layouts.navigation')
<x-app-layout>

    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="col-6">

                <h1>Noticias</h1>

                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Pesquisar...">
                    <button class="br-button primary" type="submit">Buscar
                        <i class="fas fa-clipboard"></i>
                    </button>
                </form>

                @if ($message = Session::get('success'))
                    <div class="alert alert-sucess">
                        {{ $message }}
                    </div>
                @endif
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('noticias.create') }}" class="btn btn-primary">Criar Noticia</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
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
                                        <a href="{{ route('noticias.show', $noticia->url) }}"
                                            class="br-button circle"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('noticias.edit', $noticia->id) }}"
                                            class="br-button circle"><i class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="br-button circle">
                                            <i class="fas fa-trash" style="color: #FFFF;"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $noticias->links() }}
                </div>
            </div>
        </div>
</x-app-layout>
