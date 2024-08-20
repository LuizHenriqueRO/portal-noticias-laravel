<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{

    public function index(Request $request)
    {
        $filters = $request->only(['title','description']);
        $noticias = Noticia::filter($filters)->paginate(10)->withQueryString();

        // Buscar as 3 últimas notícias para o carousel
        $ultimasNoticias = Noticia::orderBy('created_at', 'desc')->take(3)->get();

        // Passa tanto as notícias paginadas quanto as últimas notícias para a view
        return view('dashboard', compact('noticias', 'ultimasNoticias'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $noticias = Noticia::search($query)->get();

        return view('search-results', compact('noticias'));
    }

    public function home()
    {
        $noticias = Noticia::all(); // Todas as notícias
        $ultimasNoticias = Noticia::orderBy('created_at', 'desc')->take(3)->get(); // As 3 últimas notícias para o carousel

        return view('home', compact('noticias', 'ultimasNoticias'));
    }


    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'arquivo' => 'required|file|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        $noticia->storeArquivos($request->file('arquivo'));
        return redirect()->route('dashboard')->with('success', 'Noticia criada com sucesso');
    }

    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticia $noticia)
    {
       
        $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'arquivo' => 'required|file|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;

        if ($request->hasFile('arquivo')) {
            $noticia->storeArquivos($request->file('arquivo'));
        }

        $noticia->save();
        return redirect()->route('dashboard')->with('success', 'Noticia atualizada com sucesso');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('dashboard')->with('success', 'Noticia deletada com sucesso');
    }
}