<?php
namespace Jeckel\Gherkin;

use Codeception\Lib\Interfaces\RequiresPackage;
use Codeception\Configuration;

/**
 * Class Clock
 * @package Jeckel\Gherkin
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class Clock extends ContextAbstract implements RequiresPackage
{
    /** @var array */
    protected $requiredFields = ['clock_path'];

    // disable all inherited actions
    public static $includeInheritedActions = false;

    // phpcs:disable
    /**
     * @return array
     */
    public function _requires()
    {
        return ['Jeckel\Clock\ClockInterface' => '"jeckel/clock": "^1.0.0"'];
    }
    // phpcs:enable

    /**
     * @Given I set fake clock to :clock
     * @param string $clock
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function setFakeClockTo(string $clock)
    {
        file_put_contents(Configuration::projectDir() . $this->config['clock_path'], $clock);
    }
}
