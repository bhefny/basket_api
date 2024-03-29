<?php

use Phinx\Migration\AbstractMigration;

class CreateBasketsTable extends AbstractMigration
{
    public function change()
    {
        $product = $this->table('baskets');
        $product
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addColumn('session_id', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('created', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ;

        $product->create();


    }

}
