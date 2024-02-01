<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'produto_id',
        'cliente_id'
    ];

    public function produto() {
        return $this->belongsTo(Produtos::class);
    }

    public function cliente() {
        return $this->belongsTo(Clientes::class);
    }

    public function getVendasPesquisarIndex(string $search = '') {
        $vendas = $this->where(function ($query) use ($search) {
            if($search) {
                $query->where('numero_da_venda', $search);
                $query->orWhere('numero_da_venda', 'ilike', "%{$search}%");
            }
        })->get();

        return $vendas;


    }

}
