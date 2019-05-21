<?php

namespace Jeckel\Gherkin;

use Behat\Gherkin\Node\TableNode;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module\WebDriver;
use Codeception\Util\Fixtures;

/**
 * Class WebdriverHelper
 * @package Jeckel\GherkinHelper
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class WebdriverContext extends ContextAbstract implements DependsOnModule
{
    /**
     * Allows to explicitly set what methods have this class.
     *
     * All methods in this context should be use in Gherkin file, not as Action in CEST files
     *
     * @var array
     */
    public static $onlyActions = [];

    /** @var WebDriver */
    protected $webDriver;

    // phpcs:disable
    /**
     * @return array
     */
    public function _depends(): array
    {
        return [
            WebDriver::class => "Webdriver module required",
        ];
    }
    // phpcs:enable

    // phpcs:disable
    /**
     * @param WebDriver       $webDriver
     */
    public function _inject(WebDriver $webDriver)
    {
        $this->webDriver = $webDriver;
    }
    // phpcs:enable

    /**
     * @Given I am on homepage
     */
    public function iAmOnHomepage()
    {
        $this->webDriver->amOnPage('/');
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
     * @Given I am on url :url
     * @param string $url
     */
    public function iAmOnUrl(string $url)
    {
        $this->webDriver->amOnUrl($url);
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
     * @Then I grab text from :from into fixture :fixtureKey
     * @param string $from
     * @param string $fixtureKey
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function iGrabTextFromIntoFixture(string $from, string $fixtureKey)
    {
        Fixtures::add($fixtureKey, $this->webDriver->grabTextFrom($from));
    }

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
     * @Then I select option :option of :select
     * @param string $option
     * @param string $select
     */
    public function iSelectOptionOf(string $option, string $select)
    {
        $this->webDriver->selectOption($select, $option);
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
     * @Then I should not see current url equals :uri
     * @param string $uri
     */
    public function iShouldNotSeeCurrentUrlEquals(string $uri)
    {
        $this->webDriver->dontSeeCurrentUrlEquals($uri);
    }

    /**
     * @Then I should not see current url matches :uri
     * @param string $uri
     */
    public function iShouldNotSeeCurrentUrlMatches(string $uri)
    {
        $this->webDriver->dontSeeCurrentUrlMatches($uri);
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
     * @Then I should not see in source
     * @param string $raw
     */
    public function iShouldNotSeeInSource(string $raw)
    {
        $this->webDriver->dontSeeInSource($raw);
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
     * @Then I should see :text
     * @param string $text
     */
    public function iShouldSee(string $text)
    {
        $this->webDriver->see($text);
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
     * @Then I should see current url matches :uri
     * @param string $uri
     */
    public function iShouldSeeCurrentUrlMatches(string $uri)
    {
        $this->webDriver->seeCurrentUrlMatches($uri);
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
     * @Then I should see :value in field :field
     * @param string $value
     * @param string $field
     */
    public function iShouldSeeInField(string $value, string $field)
    {
        $this->webDriver->seeInField($field, $value);
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
     * @Then I should see option :option is selected in :select
     * @param string $option
     * @param string $select
     */
    public function iShouldSeeOptionIsSelectedIn(string $option, string $select)
    {
        $this->webDriver->seeOptionIsSelected($select, $option);
    }

    /**
     * @When I submit form :form
     * @param string         $form
     * @param TableNode|null $values
     */
    public function iSubmitForm(string $form, TableNode $values = null)
    {
        $this->webDriver->submitForm($form, is_null($values) ? [] : self::parseTableNode($values));
    }
}
