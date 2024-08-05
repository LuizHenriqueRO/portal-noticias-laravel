<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'titulo',
        'descricao',
        'url',
    ];

    //Query Scopes
    public function scopeFilter(Builder $query, array $filters)
    {
        if($title = $filters['title'] ?? false) {
            $query->where('titulo','like','%' . $title . '%');
        }
        if($description = $filters['title'] ?? false) {
            $query->where('titulo','like','%' . $description . '%');
        }
    }

    public function storeArquivos($arquivo) 
    {
        if ($arquivo) {
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'itulo' => $this->titulo,
            'descricao' => $this->descricao,
        ];
    }
}
