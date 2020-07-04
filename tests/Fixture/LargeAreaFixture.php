<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LargeAreaFixture
 */
class LargeAreaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'large_area';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'name' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'prefecture_name' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'prefecture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'prefecture_id' => ['type' => 'index', 'columns' => ['prefecture_id'], 'length' => []],
        ],
        '_constraints' => [
            'large_area_ibfk_1' => ['type' => 'foreign', 'columns' => ['prefecture_id'], 'references' => ['prefecture', 'prefecture_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'name' => 'Lorem ipsum dolor ',
                'prefecture_name' => 'Lorem ipsum dolor ',
                'prefecture_id' => 1
            ],
        ];
        parent::init();
    }
}
