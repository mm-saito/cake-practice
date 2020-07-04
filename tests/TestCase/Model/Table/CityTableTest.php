<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CityTable Test Case
 */
class CityTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CityTable
     */
    public $City;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.City',
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
        $config = TableRegistry::getTableLocator()->exists('City') ? [] : ['className' => CityTable::class];
        $this->City = TableRegistry::getTableLocator()->get('City', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->City);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
