<?php
/**
 * User: jeckel
 * Date: 23/04/19
 * Time: 14:42
 */
namespace Test\Jeckel\Gherkin;

use Codeception\Lib\ModuleContainer;
use Codeception\Util\Fixtures;
use Jeckel\Gherkin\AssertContext;
use PHPUnit\Framework\MockObject\MockObject;

class AssertTest extends \Codeception\Test\Unit
{
    /** @var AssertContext */
    protected $helper;

    /**
     * Setup
     */
    public function setUp(): void
    {
        /** @var MockObject | ModuleContainer $moduleContainer */
        $moduleContainer = $this->createMock(ModuleContainer::class);

        $this->helper = new AssertContext($moduleContainer);
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @test clearFixtures
     */
    public function testClearFixtures(): void
    {
        $data = new \stdClass();
        Fixtures::add('foo', $data);
        $this->assertSame($data, Fixtures::get('foo'));

        $this->helper->clearFixtures();

        $this->assertFalse(Fixtures::exists('foo'));
    }
}
