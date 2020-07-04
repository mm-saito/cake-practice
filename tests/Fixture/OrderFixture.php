<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderFixture
 */
class OrderFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'order';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'order_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '発注ID', 'autoIncrement' => true, 'precision' => null],
        'stock_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '在庫ID', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '個数', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '金額', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '在庫状態', 'precision' => null],
        'create_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '作成日', 'precision' => null],
        'update_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '更新日', 'precision' => null],
        '_indexes' => [
            'stock_id' => ['type' => 'index', 'columns' => ['stock_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['order_id'], 'length' => []],
            'order_ibfk_1' => ['type' => 'foreign', 'columns' => ['stock_id'], 'references' => ['stock', 'stock_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'order_id' => 1,
                'stock_id' => 1,
                'quantity' => 1,
                'price' => 1,
                'status' => 'L',
                'create_date' => '2019-05-22 14:38:23',
                'update_date' => '2019-05-22 14:38:23'
            ],
        ];
        parent::init();
    }
}
