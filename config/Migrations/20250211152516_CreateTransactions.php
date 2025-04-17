<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTransactions extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('transactions');
        $table
            ->addColumn('customer_id', 'integer', ['null' => false]) // Foreign key ke users (customer), tidak boleh NULL
            ->addColumn('service_id', 'integer', ['null' => false]) // Foreign key ke services, tidak boleh NULL
            ->addColumn('barber_id', 'integer', ['null' => false]) // Foreign key ke users (barber), tidak boleh NULL
            ->addColumn('date', 'date', ['null' => false]) // Harus ada nilai, tidak boleh NULL
            ->addColumn('time', 'time', ['null' => false]) // Harus ada nilai, tidak boleh NULL
            ->addColumn('status', 'enum', [
                'values' => ['pending', 'approved', 'completed', 'canceled', 'arrived'],
                'default' => 'pending',
                'null' => false
            ]) // Tidak boleh NULL
            ->addColumn('canceled', 'enum', [
                'values' => ['payment', 'timeout', 'not_paid', 'user_cancel'],
                'default' => 'payment',
                'null' => false
            ]) // Tidak boleh NULL
            ->addColumn('bukti_pembayaran', 'string', ['limit' => 150, 'null' => false]) // Tidak boleh NULL
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'null' => false]) // Tidak boleh NULL
            ->addColumn('modified', 'datetime', ['null' => false]) // Tidak boleh NULL
            // Menambahkan Foreign Keys
            ->addForeignKey('customer_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('service_id', 'services', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('barber_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
