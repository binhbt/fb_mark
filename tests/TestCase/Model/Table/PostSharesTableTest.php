<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostSharesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostSharesTable Test Case
 */
class PostSharesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PostSharesTable
     */
    public $PostShares;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.post_shares'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PostShares') ? [] : ['className' => 'App\Model\Table\PostSharesTable'];
        $this->PostShares = TableRegistry::get('PostShares', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PostShares);

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
