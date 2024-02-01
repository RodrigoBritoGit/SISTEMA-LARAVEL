<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor'
    ];

    public function getProdutosPesquisarIndex(string $search = '') {
        $produtos = $this->where(function ($query) use ($search) {
            if($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'ilike', "%{$search}%");
            }
        })->get();

        return $produtos;
    }
}
