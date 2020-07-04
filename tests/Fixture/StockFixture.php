<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StockFixture
 */
class StockFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stock';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'stock_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '在庫ID', 'autoIncrement' => true, 'precision' => null],
        'stock_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '在庫名', 'precision' => null, 'fixed' => null],
        'quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '在庫数', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '金額', 'precision' => null, 'autoIncrement' => null],
        'create_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '作成日', 'precision' => null],
        'update_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '更新日', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['stock_id'], 'length' => []],
            'stock_name' => ['type' => 'unique', 'columns' => ['stock_name'], 'length' => []],
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
                'stock_id' => 1,
                'stock_name' => 'Lorem ipsum dolor sit amet',
                'quantity' => 1,
                'price' => 1,
                'create_date' => '2019-05-22 14:03:11',
                'update_date' => '2019-05-22 14:03:11'
            ],
        ];
        parent::init();
    }
}
