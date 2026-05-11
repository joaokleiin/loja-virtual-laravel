<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::updateOrCreate(
            ['email' => 'contato@fornecedorA.com'],
            [
                'name' => 'Fornecedor A',
                'phone' => '(11) 99999-9999',
                'address' => 'Rua A, 123',
            ]
        );

        Supplier::updateOrCreate(
            ['email' => 'contato@fornecedorB.com'],
            [
                'name' => 'Fornecedor B',
                'phone' => '(21) 88888-8888',
                'address' => 'Rua B, 456',
            ]
        );
    }
}
