<?php

namespace Sil2\Vidflex\Database\Seeds;

use Illuminate\Database\Seeder;
use Sil2\Vidflex\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::truncate();

        $root = new ProductCategory(['label' => 'root']);
        $root->makeRoot()->save(); // Saved as root

        $books = new ProductCategory(['label' => 'Books']);
        $books->save();
        $books->appendTo($root)->save();

        $ba = new ProductCategory(['label' => 'Adventure']);
        $ba->save();
        $ba->appendTo($books)->save();

        $bh = new ProductCategory(['label' => 'History']);
        $bh->save();
        $bh->appendTo($books)->save();

        $music = new ProductCategory(['label' => 'Music']);
        $music->save();
        $music->appendTo($root)->save();

        $mr = new ProductCategory(['label' => 'Rock']);
        $mr->save();
        $mr->appendTo($music)->save();

        $mc = new ProductCategory(['label' => 'Classic']);
        $mc->save();
        $mc->appendTo($music)->save();

    }
}
