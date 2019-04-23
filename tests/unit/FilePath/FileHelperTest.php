<?php
/**
 * User: jeckel
 * Date: 23/04/19
 * Time: 17:41
 */
namespace Test\Jeckel\Gherkin\FilePath;

use Codeception\Test\Unit;
use Codeception\Lib\ModuleContainer;
use Jeckel\Gherkin\FilePath\FileHelper;
use PHPUnit\Framework\MockObject\MockObject;
use Codeception\Configuration;

/**
 * Class FileHelperTest
 * @package Test\Jeckel\Gherkin\FilePath
 */
class FileHelperTest extends Unit
{
    /** @var FileHelper */
    protected $fileHelper;

    /**
     * FileHelperTest constructor.
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        /** @var MockObject | ModuleContainer $moduleContainer */
        $moduleContainer = $this->createMock(ModuleContainer::class);

        $this->fileHelper = new FileHelper($moduleContainer);
    }

    /**
     * @test setDataDir
     * @test getDataDir
     */
    public function testGetDataDir()
    {
        $this->assertSame(Configuration::dataDir(), $this->fileHelper->getDataDir());

        $dataDir = '/foo/data';
        $this->assertSame($this->fileHelper, $this->fileHelper->setDataDir($dataDir));
        $this->assertSame($dataDir, $this->fileHelper->getDataDir());
    }

    /**
     * @test setProjectDir
     * @test getProjectDir
     */
    public function testGetProjectDir()
    {
        $this->assertSame(Configuration::projectDir(), $this->fileHelper->getProjectDir());

        $projectDir = '/foo/project';
        $this->assertSame($this->fileHelper, $this->fileHelper->setProjectDir($projectDir));
        $this->assertSame($projectDir, $this->fileHelper->getProjectDir());
    }

    /**
     * @test setSupportDir
     * @test getSupportDir
     */
    public function testGetSupportDir()
    {
        $this->assertSame(Configuration::supportDir(), $this->fileHelper->getSupportDir());

        $supportDir = '/foo/support';
        $this->assertSame($this->fileHelper, $this->fileHelper->setSupportDir($supportDir));
        $this->assertSame($supportDir, $this->fileHelper->getSupportDir());
    }

    /**
     * @test getAbsolutePathTo
     */
    public function testGetAbsolutePathTo()
    {
        $this->assertSame(
            Configuration::projectDir().'foo/bar',
            $this->fileHelper->getAbsolutePathTo('foo/bar', FileHelper::PATH_TO_PROJECT)
        );
        $this->assertSame(
            Configuration::dataDir().'foo/bar',
            $this->fileHelper->getAbsolutePathTo('foo/bar', FileHelper::PATH_TO_DATA)
        );
        $this->assertSame(
            Configuration::supportDir().'foo/bar',
            $this->fileHelper->getAbsolutePathTo('foo/bar', FileHelper::PATH_TO_SUPPORT)
        );
    }
}
