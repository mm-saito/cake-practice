<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $order_id
 * @property int $stock_id
 * @property int $quantity
 * @property int $price
 * @property string $status
 * @property \Cake\I18n\FrozenTime|null $create_date
 * @property \Cake\I18n\FrozenTime|null $update_date
 *
 * @property \App\Model\Entity\Stock $stock
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'stock_id' => true,
        'quantity' => true,
        'price' => true,
        'status' => true,
        'create_date' => true,
        'update_date' => true,
        'stock' => true
    ];
}
