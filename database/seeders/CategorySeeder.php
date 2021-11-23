<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Diamante',
            'Ouro',
            'Prata',
            'Bronze'
        ];

        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category
            ]);
        }
    }
}
