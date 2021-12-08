<?php

namespace Sil2\Vidflex\Database\Seeds;

use Illuminate\Database\Seeder;

class VidflexSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(\Sil2\Vidflex\Database\Seeds\UserSeeder::class);
        $this->call(\Sil2\Vidflex\Database\Seeds\ProductCategorySeeder::class);
        $this->call(\Sil2\Vidflex\Database\Seeds\ProductTypeSeeder::class);
        $this->call(\Sil2\Vidflex\Database\Seeds\ProductSeeder::class);
    }
}
