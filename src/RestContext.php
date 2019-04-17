<?php

namespace Jeckel\Gherkin;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module;
use Codeception\Module\REST;

/**
 * Class RestHelper
 * @package Jeckel\Gherkin
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class RestContext extends Module implements DependsOnModule, Context
{
    /** @var REST */
    protected $rest;

    /** @var ParameterParser */
    protected $paramParser;

    // phpcs:disable

    /**
     * @return array
     */
    public function _depends()
    {
        return [
            REST::class => "REST module required",
        ];
    }
    // phpcs:enable

    // phpcs:disable
    /**
     * @param REST            $rest
     * @param ParameterParser $paramParser
     */
    public function _inject(
        REST $rest,
        ParameterParser $paramParser
    )
    {
        $this->rest = $rest;
        $this->paramParser = $paramParser;
    }
    // phpcs:enable

    /**
     * @Given I have http header :header with value :value
     * @param string $header
     * @param string $value
     */
    public function iHaveHttpHeaderWithValue(string $header, string $value)
    {
        $this->rest->haveHttpHeader($header, $value);
    }

    /**
     * @When I delete http header :header
     * @param string $header
     */
    public function iDeleteHttpHeader(string $header)
    {
        $this->rest->deleteHeader($header);
    }

    /**
     * @Then I should see http header :header
     * @param string $header
     */
    public function iShouldSeeHttpHeader(string $header)
    {
        $this->rest->seeHttpHeader($header);
    }

    /**
     * @Then I should see http header :header with value :value
     * @param string $header
     * @param string $value
     */
    public function iShouldSeeHttpHeaderWithValue(string $header, string $value)
    {
        $this->rest->seeHttpHeader($header, $value);
    }

    /**
     * @When I send a GET request to :url
     * @param string $url
     */
    public function iSendAGETRequestTo(string $url)
    {
        $this->rest->sendGET($url);
    }

    /**
     * @Then the response status code should be :num
     * @param int $num
     */
    public function theResponseStatusCodeShouldBe(int $num)
    {
        $this->rest->seeResponseCodeIs($num);
    }

    /**
     * @Then the response should be in JSON
     */
    public function theResponseShouldBeInJSON()
    {
        $this->rest->seeResponseIsJson();
    }

    /**
     * @Then the JSON should be equal to :json
     * @param string $json
     */
    public function theJSONShouldBeEqualTo(string $json)
    {
        $this->rest->seeResponseEquals($json);
    }

    /**
     * @When I send a POST request to :url with parameters
     * @param string    $url
     * @param TableNode $tableNode
     */
    public function iSendAPOSTRequestToWithParameters(string $url, TableNode $tableNode)
    {
        $this->rest->sendPost($url, $this->paramParser->parseTableNode($tableNode));
    }

    /**
     * @When I send a PUT request to :url with parameters
     * @param string    $url
     * @param TableNode $tableNode
     */
    public function iSendAPUTRequestToWithParameters(string $url, TableNode $tableNode)
    {
        $this->rest->sendPut($url, $this->paramParser->parseTableNode($tableNode));
    }

    /**
     * @Then I should see response json matches JsonPath :path
     * @param string $path
     */
    public function iShouldSeeResponseJsonMatchesJsonPath(string $path)
    {
        $this->rest->seeResponseJsonMatchesJsonPath($path);
    }
}
