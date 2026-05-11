<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = Type::orderBy('name')->get();

        if ($types->isEmpty()) {
            $this->command?->warn('Nenhum tipo de produto encontrado. Cadastre ou rode o TypesSeeder primeiro.');

            return;
        }

        $createdOrUpdated = 0;

        foreach ($types as $type) {
            foreach ($this->productsForType($type) as $product) {
                // Evita duplicar produtos quando o seeder for executado mais de uma vez.
                Product::updateOrCreate(
                    [
                        'name' => $product['name'],
                        'type_id' => $type->id,
                    ],
                    [
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'quantity' => $product['quantity'],
                        'supplier_id' => null,
                    ]
                );

                $createdOrUpdated++;
            }
        }

        $this->command?->info($createdOrUpdated.' produtos de exemplo criados ou atualizados.');
    }

    /**
     * Retorna produtos de exemplo de acordo com o nome do tipo/categoria.
     */
    private function productsForType(Type $type): array
    {
        $typeName = Str::lower($type->name);

        if (Str::contains($typeName, ['informat', 'tecnolog', 'eletr', 'comput', 'celular'])) {
            return [
                [
                    'name' => 'Mouse Gamer RGB',
                    'description' => 'Mouse com sensor preciso, iluminacao RGB e design confortavel para jogos e trabalho.',
                    'price' => 89.90,
                    'quantity' => 18,
                ],
                [
                    'name' => 'Teclado Mecanico',
                    'description' => 'Teclado mecanico com teclas resistentes, resposta rapida e acabamento moderno.',
                    'price' => 199.90,
                    'quantity' => 12,
                ],
                [
                    'name' => 'Fone Bluetooth',
                    'description' => 'Fone sem fio com boa autonomia de bateria e audio limpo para o dia a dia.',
                    'price' => 149.90,
                    'quantity' => 20,
                ],
            ];
        }

        if (Str::contains($typeName, ['roup', 'vest', 'moda', 'calcado', 'tenis'])) {
            return [
                [
                    'name' => 'Camiseta Basica',
                    'description' => 'Camiseta de algodao com modelagem confortavel para uso diario.',
                    'price' => 49.90,
                    'quantity' => 35,
                ],
                [
                    'name' => 'Jaqueta Jeans',
                    'description' => 'Jaqueta jeans casual, resistente e facil de combinar com varios estilos.',
                    'price' => 159.90,
                    'quantity' => 10,
                ],
                [
                    'name' => 'Tenis Casual',
                    'description' => 'Tenis leve e versatil para passeios, estudos e rotina de trabalho.',
                    'price' => 189.90,
                    'quantity' => 14,
                ],
            ];
        }

        if (Str::contains($typeName, ['aliment', 'mercado', 'bebida', 'comida'])) {
            return [
                [
                    'name' => 'Cafe Tradicional 500g',
                    'description' => 'Cafe torrado e moido com aroma intenso para acompanhar sua rotina.',
                    'price' => 18.90,
                    'quantity' => 40,
                ],
                [
                    'name' => 'Arroz Tipo 1 5kg',
                    'description' => 'Arroz branco tipo 1 em pacote de 5kg, ideal para as refeicoes da familia.',
                    'price' => 26.50,
                    'quantity' => 28,
                ],
                [
                    'name' => 'Chocolate ao Leite',
                    'description' => 'Chocolate cremoso ao leite, perfeito para sobremesas e pequenos lanches.',
                    'price' => 9.90,
                    'quantity' => 55,
                ],
            ];
        }

        if (Str::contains($typeName, ['livro', 'papelaria', 'escritor', 'caderno'])) {
            return [
                [
                    'name' => 'Livro de Programacao',
                    'description' => 'Livro introdutorio com exemplos praticos para aprender desenvolvimento de software.',
                    'price' => 79.90,
                    'quantity' => 16,
                ],
                [
                    'name' => 'Caderno Universitario',
                    'description' => 'Caderno espiral com capa resistente e folhas pautadas para estudos.',
                    'price' => 24.90,
                    'quantity' => 32,
                ],
                [
                    'name' => 'Caneta Esferografica',
                    'description' => 'Caneta azul de escrita macia, indicada para escola, escritorio e uso diario.',
                    'price' => 3.50,
                    'quantity' => 100,
                ],
            ];
        }

        if (Str::contains($typeName, ['casa', 'decor', 'move', 'utilidade'])) {
            return [
                [
                    'name' => 'Luminaria de Mesa',
                    'description' => 'Luminaria compacta com visual moderno para estudos, leitura e escritorio.',
                    'price' => 69.90,
                    'quantity' => 18,
                ],
                [
                    'name' => 'Jogo de Toalhas',
                    'description' => 'Kit de toalhas macias com boa absorcao para uso diario.',
                    'price' => 89.90,
                    'quantity' => 13,
                ],
                [
                    'name' => 'Organizador Multiuso',
                    'description' => 'Organizador pratico para guardar objetos e manter ambientes mais arrumados.',
                    'price' => 39.90,
                    'quantity' => 24,
                ],
            ];
        }

        return [
            [
                'name' => 'Produto Especial '.$type->name,
                'description' => 'Produto selecionado da categoria '.$type->name.' com qualidade e bom custo-beneficio.',
                'price' => 59.90,
                'quantity' => 15,
            ],
            [
                'name' => 'Kit Promocional '.$type->name,
                'description' => 'Kit de exemplo para destacar ofertas disponiveis na categoria '.$type->name.'.',
                'price' => 99.90,
                'quantity' => 10,
            ],
            [
                'name' => 'Item Premium '.$type->name,
                'description' => 'Opcao premium para clientes que buscam um produto diferenciado nesta categoria.',
                'price' => 149.90,
                'quantity' => 8,
            ],
        ];
    }
}
