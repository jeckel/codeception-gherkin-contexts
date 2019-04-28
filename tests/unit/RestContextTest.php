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
use Codeception\Util\Fixtures;
use Jeckel\Clock\ClockFactory;
use Jeckel\Gherkin\Config;
use Jeckel\Gherkin\FilePath\FileHelper;
use Jeckel\Gherkin\RestContext;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;
use PHPUnit\Framework\MockObject\MockObject;

class RestContextTest extends Unit
{
    /** @var REST | MockObject */
    protected $rest;

    /** @var RestContext */
    protected $helper;

    /** @var FileHelper */
    protected $fileHelper;

    /**
     * Setup
     */
    public function setUp(): void
    {
        $this->rest = $this->createMock(REST::class);
        $this->fileHelper = $this->createMock(FileHelper::class);

        /** @var MockObject | ModuleContainer $moduleContainer */
        $moduleContainer = $this->createMock(ModuleContainer::class);

        $this->helper = new RestContext($moduleContainer);
        $this->helper->_inject($this->rest);
        $this->helper->setFileHelper($this->fileHelper);

        return parent::setUp();
    }

    public function testIGrabDataFromResponseByJsonPathIntoFixture(): void
    {
        Fixtures::cleanup();
        $this->assertFalse(Fixtures::exists('token'));
        $this->rest->expects($this->once())
            ->method('grabDataFromResponseByJsonPath')
            ->with('$.jsonPath')
            ->willReturn('foobar');
        $this->helper->iGrabDataFromResponseByJsonPathIntoFixture('$.jsonPath', 'token');
        $this->assertTrue(Fixtures::exists('token'));
        $this->assertEquals('foobar', Fixtures::get('token'));
    }

    /**
     * @test iSendAPOSTRequestToWithParameters
     */
    public function testISendAPOSTRequestToWithParameters(): void
    {
        $rows = [
            ['field', 'value'],
            ['login', 'bob'],
            ['password', '123Password!'],
        ];
        $expected = [
            'login' => 'bob',
            'password' => '123Password!',
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

    /**
     * @test iSendAPUTRequestToWithParameters
     */
    public function testISendAPUTRequestToWithParameters(): void
    {
        $rows = [
            ['field', 'value'],
            ['login', 'bob'],
            ['password', '123Password!'],
        ];
        $expected = [
            'login' => 'bob',
            'password' => '123Password!',
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

    /**
     * @test iShouldSeeResponseContainsJson
     */
    public function testIShouldSeeResponseContainsJson(): void
    {
        $jsonInput = '{"foo": ["bar", "baz"]}';

        $this->rest->expects($this->once())
            ->method('seeResponseContainsJson')
            ->with(['foo' => ['bar', 'baz']]);
        $this->helper->iShouldSeeResponseContainsJson($jsonInput);
    }

    /**
     * @test iShouldSeeResponseContainsJson
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument provided is not valid JSON:
     */
    public function testIShouldSeeResponseContainsJsonWithInvalidJson(): void
    {
        $this->rest->expects($this->never())
            ->method('seeResponseContainsJson');
        $this->helper->iShouldSeeResponseContainsJson('foo[]{');
    }

    /**
     * @test iShouldSeeResponseContainsJSONFromFile
     */
    public function testIShouldSeeResponseContainsJsonFromFile(): void
    {
        $jsonString = '{"foo": ["bar", "baz"]}';

        $root = vfsStream::setup('root', 444, ['content.json' => $jsonString]);
        $this->fileHelper->expects($this->once())
            ->method('getAbsolutePathTo')
            ->with('/content.json', FileHelper::PATH_TO_DATA)
            ->willReturn($root->url() . '/content.json');

        $this->rest->expects($this->once())
            ->method('seeResponseContainsJson')
            ->with(['foo' => ['bar', 'baz']]);

        $this->helper->iShouldSeeResponseContainsJSONFromFile('/content.json');
    }
}
