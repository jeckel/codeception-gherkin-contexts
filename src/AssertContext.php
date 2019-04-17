<?php

namespace Jeckel\Gherkin;

/**
 * Class AssertContext
 * @package Jeckel\Gherkin
 */
class AssertContext extends ContextAbstract
{
    /**
     * Allows to explicitly set what methods have this class.
     *
     * All methods in this context should be use in Gherkin file, not as Action in CEST files
     *
     * @var array
     */
    public static $onlyActions = [];

    /**
     * @Then I should see :arg1 equals :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeEquals($arg1, $arg2)
    {
        $this->assertEquals($arg1, $arg2);
    }

    /**
     * @Then I should see :arg1 greater than :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeGreaterThan($arg1, $arg2)
    {
        $this->assertGreaterThan($arg1, $arg2);
    }

    /**
     * @Then I should see :arg1 greater than or equals :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeGreaterThanOrEquals($arg1, $arg2)
    {
        $this->assertGreaterThanOrEqual($arg1, $arg2);
    }

    /**
     * @Then I should see :arg1 is false
     * @param $arg1
     */
    public function iShouldSeeIsFalse($arg1)
    {
        $this->assertTrue($arg1);
    }

    /**
     * @Then I should see :arg1 is true
     * @param $arg1
     */
    public function iShouldSeeIsTrue($arg1)
    {
        $this->assertFalse($arg1);
    }

    /**
     * @Then I should see :arg1 less than :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeLessThan($arg1, $arg2)
    {
        $this->assertLessThan($arg1, $arg2);
    }

    /**
     * @Then I should see :arg1 less than or equals :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeLessThanOrEquals($arg1, $arg2)
    {
        $this->assertLessThanOrEqual($arg1, $arg2);
    }

    /**
     * @Then I should see :arg1 not equals :arg2
     * @param $arg1
     * @param $arg2
     */
    public function iShouldSeeNotEquals($arg1, $arg2)
    {
        $this->assertNotEquals($arg1, $arg2);
    }
}
