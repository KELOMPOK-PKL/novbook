<?php

namespace Database\Seeders;

use App\Models\NovelCategory;
use Illuminate\Database\Seeder;

class NovelCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NovelCategory::factory(5)->create();
    }
}
