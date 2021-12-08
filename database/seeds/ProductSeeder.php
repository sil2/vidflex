<?php

namespace Sil2\Vidflex\Database\Seeds;

use Illuminate\Database\Seeder;
use Sil2\Vidflex\Models\Product;
use Sil2\Vidflex\Models\ProductAttribute;
use Sil2\Vidflex\Models\ProductCategory;
use Sil2\Vidflex\Models\ProductType;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $product_digital = ProductType::where('name', 'digital')->first();

        $product_physical = ProductType::where('name', 'physical')->first();

        $product_categories = ProductCategory::where('lvl', '>', '0')->get()->pluck('id', 'id')->toArray();

        Product::truncate();
        ProductAttribute::truncate();
        $i = 0;
        foreach (range(1, 50) as $id) {
            $p = new Product();
            if ($i % 2 == 0) {
                $p->type_id = $product_physical->id;
            } else {
                $p->type_id = $product_digital->id;
            }
            $p->label = $faker->sentence($faker->numberBetween(1, 5));

            $p->category_id = array_rand($product_categories, 1);
            $p->price       = $faker->randomNumber(2);
            $p->save();

            if ($p->type_id == $product_physical->id) {
                $pa = ProductAttribute::create([
                    'product_id' => $p->id,
                    'name'       => 'Weight',
                    'value'      => $faker->randomFloat(2, 1, 1000)

                ]);
            } else {

                $pa = ProductAttribute::create([
                    'product_id' => $p->id,
                    'name'       => 'DownloadURL',
                    'value'      => $faker->url()

                ]);
            }
            $i++;
        }
    }
}
