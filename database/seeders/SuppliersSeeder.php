<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'Fornecedor A',
            'email' => 'contato@fornecedorA.com',
            'phone' => '(11) 99999-9999',
            'address' => 'Rua A, 123'
        ]);
        Supplier::create([
            'name' => 'Fornecedor B',
            'email' => 'contato@fornecedorB.com',
            'phone' => '(21) 88888-8888',
            'address' => 'Rua B, 456'
        ]);
    }
}
