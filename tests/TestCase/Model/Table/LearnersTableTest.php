<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LearnersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LearnersTable Test Case
 */
class LearnersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LearnersTable
     */
    public $Learners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Learners',
        'app.Schools',
        'app.Transferdata',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Learners') ? [] : ['className' => LearnersTable::class];
        $this->Learners = TableRegistry::getTableLocator()->get('Learners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Learners);

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
