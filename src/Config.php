<?php

namespace Jeckel\Gherkin;

use Codeception\Module;
use Jeckel\Gherkin\FilePath\FilePathAwareInterface;
use Jeckel\Gherkin\FilePath\FilePathAwareTrait;

/**
 * Class Config
 * @package Jeckel\Gherkin
 */
class Config extends Module implements FilePathAwareInterface
{
    use FilePathAwareTrait;
}
