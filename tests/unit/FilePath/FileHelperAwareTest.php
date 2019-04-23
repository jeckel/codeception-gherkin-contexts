<?php
/**
 * User: jeckel
 * Date: 23/04/19
 * Time: 17:56
 */
namespace Test\Jeckel\Gherkin\FilePath;

use Codeception\Lib\ModuleContainer;
use Codeception\Test\Unit;
use Jeckel\Gherkin\FilePath\FileHelper;
use Jeckel\Gherkin\FilePath\FileHelperAwareTrait;

class FileHelperAwareTest extends Unit
{
    public function testSetGetFileHelper()
    {
        $module = $this->getObjectForTrait(FileHelperAwareTrait::class);

        /** @var FileHelper $fileHelper */
        $fileHelper = $this->createMock(FileHelper::class);

        $this->assertSame($module, $module->setFileHelper($fileHelper));
        $this->assertSame($fileHelper, $module->getFileHelper());
    }

    public function testGetFileHelperFromModuleContainer()
    {
        $module = $this->getObjectForTrait(FileHelperAwareTrait::class);

        $fileHelper = $this->createMock(FileHelper::class);

        $moduleContainer = $this->createMock(ModuleContainer::class);
        $module->moduleContainer = $moduleContainer;

        $moduleContainer->expects($this->at(0))
            ->method('hasModule')
            ->with(FileHelper::class)
            ->willReturn(false);
        $moduleContainer->expects($this->at(1))
            ->method('create')
            ->with(FileHelper::class);
        $moduleContainer->expects($this->at(2))
            ->method('getModule')
            ->with(FileHelper::class)
            ->willReturn($fileHelper);

        $this->assertSame($fileHelper, $module->getFileHelper());
    }
}
