<?php

namespace Sil2\Vidflex\Database\Seeds;

use Illuminate\Database\Seeder;
use Sil2\Vidflex\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::truncate();

        $ptp       = new ProductType();
        $ptp->name = 'physical';
        $ptp->save();

        $ptd       = new ProductType();
        $ptd->name = 'digital';
        $ptd->save();

    }
}
