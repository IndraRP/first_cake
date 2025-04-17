<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateServices extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('services');
        $table->addColumn('service_name', 'string', ['limit' => 100])
            ->addColumn('description', 'text')
            ->addColumn('price', 'integer')
            ->addColumn('image', 'string', ['limit' => 150, 'null' => true])
            ->addColumn('status', 'enum', ['values' => ['active', 'blocked'], 'default' => 'active'])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('modified', 'datetime', ['null' => true])
            ->create();
    }
}
