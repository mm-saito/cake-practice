<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $stock_id
 * @property string $stock_name
 * @property int $quantity
 * @property int $price
 * @property \Cake\I18n\FrozenTime|null $create_date
 * @property \Cake\I18n\FrozenTime|null $update_date
 */
class Stock extends Entity
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
        'stock_name' => true,
        'quantity' => true,
        'price' => true,
        'create_date' => true,
        'update_date' => true
    ];
}
