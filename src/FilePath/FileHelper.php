<?php

namespace Jeckel\Gherkin\FilePath;

use Codeception\Configuration;
use Codeception\Module;

/**
 * Class FileHelper
 * @package Jeckel\Gherkin\FilePath
 */
class FileHelper extends Module
{
    const PATH_TO_PROJECT = 'project';
    const PATH_TO_DATA    = 'data';
    const PATH_TO_SUPPORT = 'support';

    /** @var string */
    private $projectDir;

    /** @var string */
    private $dataDir;

    /** @var string */
    private $supportDir;

    /**
     * @param string $filepath
     * @param string $pathTo
     * @return string
     */
    public function getAbsolutePathTo(string $filepath, string $pathTo = ''): string
    {
        $path = realpath($this->getBasePath($pathTo) . $filepath);
        if (! $path) {
            throw new \RuntimeException(sprintf('Invalid path %s', $this->getBasePath($pathTo) . $filepath));
        }
        return $path;
    }

    /**
     * @param string $pathTo
     * @return string
     */
    private function getBasePath(string $pathTo)
    {
        switch ($pathTo) {
            case FileHelper::PATH_TO_PROJECT:
                return $this->getProjectDir() . '/';
            case FileHelper::PATH_TO_DATA:
                return $this->getDataDir() . '/';
            case FileHelper::PATH_TO_SUPPORT:
                return $this->getSupportDir() . '/';
        }
        return '';
    }

    /**
     * @return string
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getProjectDir()
    {
        if (empty($this->projectDir)) {
            return Configuration::projectDir();
        }
        return $this->projectDir;
    }

    /**
     * @param string $projectDir
     * @return self
     */
    public function setProjectDir(string $projectDir): self
    {
        $this->projectDir = $projectDir;
        return $this;
    }

    /**
     * @return string
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getDataDir(): string
    {
        if (empty($this->dataDir)) {
            return Configuration::dataDir();
        }
        return $this->dataDir;
    }

    /**
     * @param string $dataDir
     * @return self
     */
    public function setDataDir(string $dataDir): self
    {
        $this->dataDir = $dataDir;
        return $this;
    }

    /**
     * @return string
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getSupportDir(): string
    {
        if (empty($this->supportDir)) {
            return Configuration::supportDir();
        }
        return $this->supportDir;
    }

    /**
     * @param string $supportDir
     * @return self
     */
    public function setSupportDir(string $supportDir): self
    {
        $this->supportDir = $supportDir;
        return $this;
    }
}
