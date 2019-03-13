<?php

use Phinx\Migration\AbstractMigration;

class CreateProductsTable extends AbstractMigration
{
    public function change()
    {
        $product = $this->table('products');
        $product
            ->addColumn('title', 'string', ['limit' => 45, 'null' => false])
            ->addColumn('created', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ;

        $product->create();


    }

}
