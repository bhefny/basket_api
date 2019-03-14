<?php

use Phinx\Migration\AbstractMigration;

class CreateBasketProductsTable extends AbstractMigration
{
    public function change()
    {
        $product = $this->table('basket_products');
        $product
            ->addColumn('basket_id', 'integer', ['null' => false])
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('created', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ;

        $product->create();


    }

}
