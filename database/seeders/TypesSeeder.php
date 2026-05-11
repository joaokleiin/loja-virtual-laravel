<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Type::where('name', 'like', 'Eletr%')->exists()) {
            Type::create(['name' => 'Eletronicos']);
        }

        Type::firstOrCreate(['name' => 'Roupas']);
        Type::firstOrCreate(['name' => 'Alimentos']);
        Type::firstOrCreate(['name' => 'Livros']);
    }
}
