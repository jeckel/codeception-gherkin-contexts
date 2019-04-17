<?php
/**
 * User: jeckel
 * Date: 16/04/19
 * Time: 10:12
 */

namespace Test\Jeckel\Gherkin;

use Behat\Gherkin\Node\TableNode;
use Codeception\Lib\ModuleContainer;
use Codeception\Module\REST;
use Codeception\Test\Unit;
use Jeckel\Gherkin\RestContext;
use PHPUnit\Framework\MockObject\MockObject;

class RestContextTest extends Unit
{
    /** @var REST | MockObject */
    protected $rest;

    /** @var RestContext */
    protected $helper;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->rest = $this->createMock(REST::class);

        /** @var MockObject | ModuleContainer $moduleContainer */
        $moduleContainer = $this->createMock(ModuleContainer::class);
        $this->helper = new RestContext($moduleContainer);
        $this->helper->_inject($this->rest);

        return parent::setUp();
    }

    public function testISendAPOSTRequestToWithParameters()
    {
        $rows = [
            ['field', 'value'],
            ['login', 'bob'],
            ['password', '123Password!']
        ];
        $expected = [
            'login' => 'bob',
            'password' => '123Password!'
        ];
        $tableNode = $this->createMock(TableNode::class);
        $tableNode->expects($this->once())
            ->method('getRows')
            ->willReturn($rows);

        $this->rest->expects($this->once())
            ->method('sendPost')
            ->with('http://foo.bar', $expected);

        $this->helper->iSendAPOSTRequestToWithParameters('http://foo.bar', $tableNode);
    }

    public function testISendAPUTRequestToWithParameters()
    {
        $rows = [
            ['field', 'value'],
            ['login', 'bob'],
            ['password', '123Password!']
        ];
        $expected = [
            'login' => 'bob',
            'password' => '123Password!'
        ];
        $tableNode = $this->createMock(TableNode::class);
        $tableNode->expects($this->once())
            ->method('getRows')
            ->willReturn($rows);

        $this->rest->expects($this->once())
            ->method('sendPut')
            ->with('http://foo.bar', $expected);

        $this->helper->iSendAPUTRequestToWithParameters('http://foo.bar', $tableNode);
    }
}
