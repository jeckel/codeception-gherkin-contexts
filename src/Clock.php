<?php
namespace Jeckel\Gherkin;

use Codeception\Lib\Interfaces\RequiresPackage;

/**
 * Class Clock
 * @package Jeckel\Gherkin
 */
class Clock extends ContextAbstract implements RequiresPackage
{
    /** @var array */
    protected $requiredFields = ['clock_path'];

    // disable all inherited actions
    public static $includeInheritedActions = false;

    /**
     * @return array
     */
    public function _requires()
    {
        return ['Jeckel\Clock\ClockInterface' => '"jeckel/clock": "^1.0.0"'];
    }

    /**
     * @Given I set fake clock to :clock
     * @param string $clock
     */
    public function setFakeClockTo(string $clock)
    {
        file_put_contents(codecept_root_dir().$this->config['clock_path'], $clock);
    }
}
