<?php

namespace Jeckel\Gherkin;

use Behat\Gherkin\Node\TableNode;
use Codeception\Configuration;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Lib\ModuleContainer;
use Codeception\Module\REST;
use Codeception\Util\Fixtures;
use Exception;
use Jeckel\Gherkin\FilePath\FileHelper;
use Jeckel\Gherkin\FilePath\FileHelperAwareInterface;
use Jeckel\Gherkin\FilePath\FileHelperAwareTrait;

/**
 * Class RestHelper
 * @package Jeckel\Gherkin
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class RestContext extends ContextAbstract implements DependsOnModule, FileHelperAwareInterface
{
    use FileHelperAwareTrait;

    /**
     * Allows to explicitly set what methods have this class.
     *
     * All methods in this context should be use in Gherkin file, not as Action in CEST files
     *
     * @var array
     */
    public static $onlyActions = [];

    /** @var REST */
    protected $rest;

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
     * @param REST $rest
     */
    public function _inject(REST $rest)
    {
        $this->rest = $rest;
    }
    // phpcs:enable

    /**
     * @When I am bearer authenticated :bearer
     * @param string $bearer
     */
    public function iAmBearerAuthenticated(string $bearer)
    {
        $this->rest->amBearerAuthenticated($bearer);
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
     * @Then I grab data from response by json path :path into fixture :key
     * @param string $path
     * @param string $key
     * @throws Exception
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function iGrabDataFromResponseByJsonPathIntoFixture(string $path, string $key)
    {
        Fixtures::add($key, $this->rest->grabDataFromResponseByJsonPath($path));
    }

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
     * @When I send a GET request to :url
     * @param string $url
     */
    public function iSendAGETRequestTo(string $url)
    {
        $this->rest->sendGET($url);
    }

    /**
     * @When I send a POST request to :url with parameters
     * @param string    $url
     * @param TableNode $tableNode
     */
    public function iSendAPOSTRequestToWithParameters(string $url, TableNode $tableNode)
    {
        $this->rest->sendPost($url, self::parseTableNode($tableNode));
    }

    /**
     * @When I send a PUT request to :url with parameters
     * @param string    $url
     * @param TableNode $tableNode
     */
    public function iSendAPUTRequestToWithParameters(string $url, TableNode $tableNode)
    {
        $this->rest->sendPut($url, self::parseTableNode($tableNode));
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
     * @Then I should see response json matches JsonPath :path
     * @param string $path
     */
    public function iShouldSeeResponseJsonMatchesJsonPath(string $path)
    {
        $this->rest->seeResponseJsonMatchesJsonPath($path);
    }

    /**
     * @Then I should see response contains json :arg1
     */
    public function iShouldSeeResponseContainsJson($arg1)
    {
        $json = json_decode($arg1);
        if (null === $json && json_last_error() != JSON_ERROR_NONE) {
            throw new \InvalidArgumentException(
                sprintf('Argument provided could not be json decode: %s', json_last_error_msg())
            );
        }
        $this->rest->seeResponseContainsJson(json_decode($arg1, true));
    }

    /**
     * @Then I should see response contains json from file :filepath
     */
    public function iShouldSeeResponseContainsJSONfromFile(string $filepath)
    {
        $json = json_decode(file_get_contents($this->getFileHelper()->getAbsolutePathTo($filepath, FileHelper::PATH_TO_DATA)), true);

        if (null === $json && json_last_error() != JSON_ERROR_NONE) {
            throw new \InvalidArgumentException(
                sprintf('Argument provided could not be json decode: %s', json_last_error_msg())
            );
        }
        $this->rest->seeResponseContainsJson(json_decode($json, true));
    }

    /**
     * @Then the response should be in JSON
     */
    public function theResponseShouldBeInJSON()
    {
        $this->rest->seeResponseIsJson();
    }

    /**
     * @Then the response status code should be :num
     * @param int $num
     */
    public function theResponseStatusCodeShouldBe(int $num)
    {
        $this->rest->seeResponseCodeIs($num);
    }
}
