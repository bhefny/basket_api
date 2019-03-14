<?php


use Phinx\Seed\AbstractSeed;

class BasketProductSeeder extends AbstractSeed
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
        $data = [
            [ 'basket_id' => 1, 'product_id' => 1 ],
            [ 'basket_id' => 1, 'product_id' => 3 ],
            [ 'basket_id' => 1, 'product_id' => 5 ],
            [ 'basket_id' => 1, 'product_id' => 7 ],
        ];
        $products = $this->table('basket_products');
        $products->truncate();
        $products->insert($data)->save();
    }
}
