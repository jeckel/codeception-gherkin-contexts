<?php

namespace Jeckel\Gherkin\FilePath;

/**
 * Class FilePathAwareInterface
 * @package Jeckel\Gherkin\FilePath
 */
interface FilePathAwareInterface
{
    const PATH_TO_PROJECT = 'project';
    const PATH_TO_DATA = 'data';
    const PATH_TO_SUPPORT = 'support';

    /**
     * @param string $filepath
     * @param string $pathTo
     * @return string
     */
    public function getAbsolutePathTo(string $filepath, string $pathTo = self::PATH_TO_PROJECT): string;
}
