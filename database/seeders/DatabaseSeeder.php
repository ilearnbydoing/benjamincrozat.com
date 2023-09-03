<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        Category::factory(10)
            ->hasPosts(10, ['is_published' => true])
            ->createQuietly();

        Merchant::factory(10)->create();
    }
}
