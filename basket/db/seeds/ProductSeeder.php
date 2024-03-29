<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'title'    => "product_$i",
                'created' => date('Y-m-d H:i:s'),
            ];
        }

        $products = $this->table('products');
        $products->truncate();
        $products->insert($data)->save();
    }
}
