<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $service_id
 * @property int $barber_id
 * @property \Cake\I18n\Date $date
 * @property \Cake\I18n\Time $time
 * @property string $status
 * @property string $canceled
 * @property string|null $bukti_pembayaran
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\Barber $barber
 */
class Transaction extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'customer_id' => true,
        'service_id' => true,
        'barber_id' => true,
        'date' => true,
        'time' => true,
        'status' => true,
        'canceled' => true,
        'bukti_pembayaran' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'service' => true,
        'barber' => true,
    ];
}
