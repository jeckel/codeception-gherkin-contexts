<?php

namespace Jeckel\Gherkin\FilePath;

use Codeception\Lib\ModuleContainer;

/**
 * Trait FileHelperAwareTrait
 * @package Jeckel\Gherkin\FilePath
 */
trait FileHelperAwareTrait
{
    /** @var FileHelper */
    protected $fileHelper;

    /**
     * @return FileHelper
     */
    public function getFileHelper(): FileHelper
    {
        if (empty($this->fileHelper)) {
            /** @var ModuleContainer */
            $moduleContainer = $this->moduleContainer;

            if (!$moduleContainer->hasModule(FileHelper::class)) {
                $moduleContainer->create(FileHelper::class);
            }
            /** @var FileHelper $module */
            $module = $moduleContainer->getModule(FileHelper::class);
            $this->fileHelper = $module;
        }
        return $this->fileHelper;
    }

    /**
     * @param FileHelper $fileHelper
     * @return self
     */
    public function setFileHelper(FileHelper $fileHelper): self
    {
        $this->fileHelper = $fileHelper;
        return $this;
    }
}
