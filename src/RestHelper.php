<?php
namespace Jeckel\Gherkin;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module;
use Codeception\Module\REST;

class RestHelper extends Module implements DependsOnModule, Context
{
    /** @var REST */
    protected $rest;

    // phpcs:disable
    /**
     * @return array
     */
    public function _depends()
    {
        return [
            REST::class => "REST module required"
        ];
    }
    // phpcs:enable

    // phpcs:disable
    /**
     * @param REST $rest
     */
    public function _inject(REST $rest)
    {
        $this->rest = $rest;
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
     * @When I send a GET request to :arg1
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
     * @Then the JSON should be equal to: :json
     * @param string $json
     */
    public function theJSONShouldBeEqualTo(string $json)
    {
        $this->rest->seeResponseEquals($json);
    }

    /**
     * @When I send a POST request to :url with parameters
     * @param string $url
     * @param TableNode $tableNode
     */
    public function iSendAPOSTRequestToWithParameters(string $url, TableNode $tableNode)
    {
        $this->rest->sendPost($url, $this->parseParams($tableNode));
    }

    /**
     * @When I send a PUT request to :url with parameters
     * @param string $url
     * @param TableNode $tableNode
     */
    public function iSendAPUTRequestToWithParameters(string $url, TableNode $tableNode)
    {
        $this->rest->sendPut($url, $this->parseParams($tableNode));
    }

    /**
     * @param TableNode $tableNode
     * @return array
     */
    protected function parseParams(TableNode $tableNode): array
    {
        $parameters = [];
        foreach ($tableNode->getRows() as $index => $row) {
            if ($index === 0) { // first row to define fields
                continue;
            }
            $parameters[$row[0]] = $row[1];
        }
        return $parameters;
    }
}
