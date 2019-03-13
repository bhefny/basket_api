<?php

use Phinx\Migration\AbstractMigration;

class CreateBasketsTable extends AbstractMigration
{
    public function change()
    {
        $product = $this->table('baskets');
        $product
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('created', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ;

        $product->create();


    }

}
