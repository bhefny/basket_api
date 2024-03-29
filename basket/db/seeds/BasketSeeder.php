<?php


use Phinx\Seed\AbstractSeed;

class BasketSeeder extends AbstractSeed
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
            [ 'user_id' => '1' ],
            [ 'user_id' => '2' ],
        ];
        $products = $this->table('baskets');
        $products->truncate();
        $products->insert($data)->save();
    }
}
