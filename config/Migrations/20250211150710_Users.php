<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class Users extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('email', 'string', ['limit' => 150, 'null' => false])
            ->addColumn('password', 'string', ['null' => false])
            ->addColumn('role', 'enum', ['values' => ['admin', 'barber', 'customer'], 'default' => 'customer'])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('modified', 'datetime', ['null' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}
