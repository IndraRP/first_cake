<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'customer_id' => 1,
                'service_id' => 1,
                'barber_id' => 1,
                'date' => '2025-02-11',
                'time' => '16:00:24',
                'status' => 'Lorem ipsum dolor sit amet',
                'canceled' => 'Lorem ipsum dolor sit amet',
                'bukti_pembayaran' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-02-11 16:00:24',
                'modified' => '2025-02-11 16:00:24',
            ],
        ];
        parent::init();
    }
}
