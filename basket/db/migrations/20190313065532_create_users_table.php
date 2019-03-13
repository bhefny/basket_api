<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    public function change()
    {
        $product = $this->table('users');
        $product
            ->addColumn('full_name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('token', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('created', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ;

        $product->create();


    }

}
