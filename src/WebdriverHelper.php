<?php
namespace Jeckel\GherkinHelper;

use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module\WebDriver;
use Codeception\Module;

class WebdriverHelper extends Module implements DependsOnModule
{
    /**
     * @var WebDriver
     */
    protected $webDriver;

    /**
     * @return array
     */
    public function _depends(): array
    {
        return [
            WebDriver::class => "Webdriver module required"
        ];
    }

    /**
     * @param WebDriver $webDriver
     */
    public function _inject(WebDriver $webDriver)
    {
        $this->webDriver = $webDriver;
    }

    /**
     * @Given I am on page :page
     * @param string $page
     */
    public function iAmOnPage(string $page)
    {
        $this->webDriver->amOnPage($page);
    }

    /**
     * @When I click :link
     * @param string $link
     */
    public function iClick(string $link)
    {
        $this->webDriver->click($link);
    }

    /**
     * @When I fill field ":field" with ":value"
     * @param string $field
     * @param string $value
     */
    public function iFillField(string $field, string $value)
    {
        $this->webDriver->fillField($field, $value);
    }

    /**
     * @Then I should see :text
     * @param string $text
     */
    public function iShouldSee(string $text)
    {
        $this->webDriver->see($text);
    }
}