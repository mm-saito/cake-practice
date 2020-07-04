<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GroupsFixture
 */
class GroupsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'group_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'グループID', 'autoIncrement' => true, 'precision' => null],
        'group_name' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'グループ名', 'precision' => null, 'fixed' => null],
        'create_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '作成日', 'precision' => null],
        'update_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '修正日', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['group_id'], 'length' => []],
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
                'group_id' => 1,
                'group_name' => 'Lorem ipsum dolor sit amet',
                'create_date' => '2019-05-22 13:05:59',
                'update_date' => '2019-05-22 13:05:59'
            ],
        ];
        parent::init();
    }
}
