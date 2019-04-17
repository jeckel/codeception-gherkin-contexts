<?php

namespace Jeckel\Gherkin;

use Codeception\Module;

/**
 * Class ContextAbstract
 * @package Jeckel\Gherkin
 */
abstract class ContextAbstract extends Module implements ContextInterface
{
    use ParameterParserTrait;
}
