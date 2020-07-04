<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrefectureTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrefectureTable Test Case
 */
class PrefectureTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrefectureTable
     */
    public $Prefecture;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Prefecture'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Prefecture') ? [] : ['className' => PrefectureTable::class];
        $this->Prefecture = TableRegistry::getTableLocator()->get('Prefecture', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prefecture);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
