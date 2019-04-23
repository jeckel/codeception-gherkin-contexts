<?php

namespace Jeckel\Gherkin\FilePath;

/**
 * Interface FileHelperAwareInterface
 * @package Jeckel\Gherkin\FilePath
 */
interface FileHelperAwareInterface
{
    public function getFileHelper(): FileHelper;
}
