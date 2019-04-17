<?php
namespace Jeckel\Gherkin;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module\WebDriver;
use Codeception\Module;

/**
 * Class WebdriverHelper
 * @package Jeckel\GherkinHelper
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class WebdriverContext extends Module implements DependsOnModule, Context
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
     * @When I make screenshot :name
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
     * @Given I am on homepage
     */
    public function iAmOnHomepage()
    {
        $this->webDriver->amOnPage('/');
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
     * @When I submit form :form
     * @param string $form
     * @param TableNode|null $values
     */
    public function iSubmitForm(string $form, TableNode $values = null)
    {
        $this->webDriver->submitForm($form, is_null($values) ? [] : $values->getRows());
    }

    /**
     * @Then I should see :text
     * @param string $text
     */
    public function iShouldSee(string $text)
    {
        $this->webDriver->see($text);
    }

    /**
     * @Then I should not see :text
     * @param string $text
     */
    public function iShouldNotSee(string $text)
    {
        $this->webDriver->dontSee($text);
    }

    /**
     * @Then I should see in source
     * @param string $raw
     */
    public function iShouldSeeInSource(string $raw)
    {
        $this->webDriver->seeInSource($raw);
    }

    /**
     * @Then I should not see in source
     * @param string $raw
     */
    public function iShouldNotSeeInSource(string $raw)
    {
        $this->webDriver->dontSeeInSource($raw);
    }

    /**
     * @Then I should see link :link
     * @param string $link
     */
    public function iShouldSeeLink(string $link)
    {
        $this->webDriver->seeLink($link);
    }

    /**
     * @Then I should see link :link with url :url
     * @param string $link
     * @param string $url
     */
    public function iShouldSeeLinkWithUrl(string $link, string $url)
    {
        $this->webDriver->seeLink($link, $url);
    }

    /**
     * @Then I should not see link :link
     * @param string $link
     */
    public function iShouldNotSeeLink(string $link)
    {
        $this->webDriver->dontSeeLink($link);
    }

    /**
     * @Then I should not see link :link with url :url
     * @param string $link
     * @param string $url
     */
    public function iShouldNotSeeLinkWithUrl(string $link, string $url)
    {
        $this->webDriver->dontSeeLink($link, $url);
    }

    /**
     * @Then I should see in current url :uri
     * @param string $uri
     */
    public function iShouldSeeInCurrentUrl(string $uri)
    {
        $this->webDriver->seeInCurrentUrl($uri);
    }

    /**
     * @Then I should not see in current url :uri
     * @param string $uri
     */
    public function iShouldNotSeeInCurrentUrl(string $uri)
    {
        $this->webDriver->dontSeeInCurrentUrl($uri);
    }

    /**
     * @Then I should see current url equals :uri
     * @param string $uri
     */
    public function iShouldSeeCurrentUrlEquals(string $uri)
    {
        $this->webDriver->seeCurrentUrlEquals($uri);
    }

    /**
     * @Then I should not see current url equals :uri
     * @param string $uri
     */
    public function iShouldNotSeeCurrentUrlEquals(string $uri)
    {
        $this->webDriver->dontSeeCurrentUrlEquals($uri);
    }

    /**
     * @Then I should see current url matches :uri
     * @param string $uri
     */
    public function iShouldSeeCurrentUrlMatches(string $uri)
    {
        $this->webDriver->seeCurrentUrlMatches($uri);
    }

    /**
     * @Then I should not see current url matches :uri
     * @param string $uri
     */
    public function iShouldNotSeeCurrentUrlMatches(string $uri)
    {
        $this->webDriver->dontSeeCurrentUrlMatches($uri);
    }
}
