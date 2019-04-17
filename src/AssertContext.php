<?php

namespace Jeckel\Gherkin;

/**
 * Class AssertContext
 * @package Jeckel\Gherkin
 */
class AssertContext extends ContextAbstract
{
    /**
     * @Then I should see :arg1 equals :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeEquals($arg1, $arg2)
    {
        $this->assertEquals($arg1, $arg2);
    }
}
