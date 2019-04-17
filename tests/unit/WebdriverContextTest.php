<?php
namespace Test\Jeckel\Gherkin;

use Codeception\Lib\ModuleContainer;
use Codeception\Module\WebDriver;
use Codeception\Test\Unit;
use Jeckel\Gherkin\WebdriverContext;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class WebdriverHelperTest
 * @package Test\Jeckel\GherkinHelper
 */
class WebdriverContextTest extends Unit
{
    /**
     * @var MockObject | WebDriver
     */
    protected $webdriver;

    /**
     * @var WebdriverContext
     */
    protected $helper;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->webdriver = $this->createMock(WebDriver::class);
        /** @var MockObject | ModuleContainer $moduleContainer */
        $moduleContainer = $this->createMock(ModuleContainer::class);
        $this->helper = new WebdriverContext($moduleContainer);
        $this->helper->_inject($this->webdriver);

        return parent::setUp();
    }

    /**
     * @test WebdriverHelper::iShouldSee
     */
    public function testIShouldSee()
    {
        $foobar = 'foobar';
        $this->webdriver->expects($this->once())
            ->method('see')
            ->with($foobar);
        $this->helper->iShouldSee($foobar);
    }

    /**
     * @test WebdriverHelper::iClick
     */
    public function testIClick()
    {
        $foobar = 'foobar';
        $this->webdriver->expects($this->once())
            ->method('click')
            ->with($foobar);
        $this->helper->iClick($foobar);
    }

    /**
     * @test WebdriverHelper::iAmOnPage
     */
    public function testIAmOnPage()
    {
        $foobar = 'foobar';
        $this->webdriver->expects($this->once())
            ->method('amOnPage')
            ->with($foobar);
        $this->helper->iAmOnPage($foobar);
    }

    /**
     * @test WebdriverHelper::iFillField
     */
    public function testIFillField()
    {
        $field = 'foobar';
        $value = 'bar baz';

        $this->webdriver->expects($this->once())
            ->method('fillField')
            ->with($field, $value);
        $this->helper->iFillField($field, $value);
    }
}
