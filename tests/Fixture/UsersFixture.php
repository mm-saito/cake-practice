<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ユーザID', 'autoIncrement' => true, 'precision' => null],
        'user_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'ユーザ名', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'fixed' => true, 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'パスワード', 'precision' => null],
        'group_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'グループID(権限)', 'precision' => null, 'autoIncrement' => null],
        'create_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '作成日', 'precision' => null],
        'update_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '更新日', 'precision' => null],
        '_indexes' => [
            'group_id' => ['type' => 'index', 'columns' => ['group_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id'], 'length' => []],
            'users_ibfk_1' => ['type' => 'foreign', 'columns' => ['group_id'], 'references' => ['groups', 'group_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'user_id' => 1,
                'user_name' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'group_id' => 1,
                'create_date' => '2019-05-22 11:12:45',
                'update_date' => '2019-05-22 11:12:45'
            ],
        ];
        parent::init();
    }
}
