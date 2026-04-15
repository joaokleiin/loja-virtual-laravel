<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(['name' => 'Eletrônicos']);
        Type::create(['name' => 'Roupas']);
        Type::create(['name' => 'Alimentos']);
        Type::create(['name' => 'Livros']);
    }
}
