<?php

namespace Database\Seeders;

use App\Models\Produtos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produtos::create([
            'nome' => 'Iphone 12',
            'valor' => '2500.00'
        ]);
    }
}
