<?php
namespace Jeckel\GherkinHelper;

use Behat\Behat\Context\Context;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module\WebDriver;
use Codeception\Module;

/**
 * Class WebdriverHelper
 * @package Jeckel\GherkinHelper
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class WebdriverHelper extends Module implements DependsOnModule, Context
{
    /**
     * @var WebDriver
     */
    protected $webDriver;

    // phpcs:disable
    /**
     * @return array
     */
    public function _depends(): array
    {
        return [
            WebDriver::class => "Webdriver module required"
        ];
    }
    // phpcs:enable

    // phpcs:disable
    /**
     * @param WebDriver $webDriver
     */
    public function _inject(WebDriver $webDriver)
    {
        $this->webDriver = $webDriver;
    }
    // phpcs:enable


    /**
     * @Then I make screenshot :name
     * @param string $name
     */
    public function iMakeScreenshot(string $name)
    {
        $this->webDriver->makeScreenshot($name);
    }

    /**
     * @When I resize window to :width and :height
     * @param int $width
     * @param int $height
     */
    public function iResizeWindow(int $width, int $height)
    {
        $this->webDriver->resizeWindow($width, $height);
    }

    /**
     * @Given I am on url :url
     * @param string $url
     */
    public function iAmOnUrl(string $url)
    {
        $this->webDriver->amOnUrl($url);
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
     * @When I fill field :field with :value
     * @param string $field
     * @param string $value
     */
    public function iFillField(string $field, string $value)
    {
        $this->webDriver->fillField($field, $value);
    }

    /**
     * @Then I should see :text
     * @Then I see :text
     * @param string $text
     */
    public function iShouldSee(string $text)
    {
        $this->webDriver->see($text);
    }

    /**
     * @Then I should not see :text
     * @Then I don't see :text
     * @param string $text
     */
    public function iShouldNotSee(string $text)
    {
        $this->webDriver->dontSee($text);
    }

    /**
     * @Then I should see in source
     * @Then I see in source
     * @param string $raw
     */
    public function iSeeInSource(string $raw)
    {
        $this->webDriver->seeInSource($raw);
    }

    /**
     * @Then I should not see in source
     * @Then I don't see in source
     * @param string $raw
     */
    public function iDontSeeInSource(string $raw)
    {
        $this->webDriver->dontSeeInSource($raw);
    }

    /**
     * @Then I see link :link
     * @param string $link
     */
    public function iSeeLink(string $link)
    {
        $this->webDriver->seeLink($link);
    }

    /**
     * @Then I see link :link with url :url
     * @param string $link
     * @param string $url
     */
    public function iSeeLinkWithUrl(string $link, string $url)
    {
        $this->webDriver->seeLink($link, $url);
    }

    /**
     * @Then I don't see link :link
     * @param string $link
     */
    public function iDontSeeLink(string $link)
    {
        $this->webDriver->dontSeeLink($link);
    }

    /**
     * @Then I don't see link :link with url :url
     * @param string $link
     * @param string $url
     */
    public function iDontSeeLinkWithUrl(string $link, string $url)
    {
        $this->webDriver->dontSeeLink($link, $url);
    }
}
