<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CityFixture
 */
class CityFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'city';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'prefecture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'citycode' => ['type' => 'string', 'fixed' => true, 'length' => 7, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'update_datetime' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'prefecture_id' => ['type' => 'index', 'columns' => ['prefecture_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['citycode'], 'length' => []],
            'city_ibfk_1' => ['type' => 'foreign', 'columns' => ['prefecture_id'], 'references' => ['prefecture', 'prefecture_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
                'prefecture_id' => 1,
                'name' => 'Lorem ipsum dolor ',
                'citycode' => '5a5facad-5ecb-479c-8ff8-920a5a5e4935',
                'update_datetime' => 1557490233
            ],
        ];
        parent::init();
    }
}
