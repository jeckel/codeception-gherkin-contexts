<?php
namespace Jeckel\Gherkin;

use Codeception\Lib\Interfaces\RequiresPackage;
use Codeception\Configuration;

/**
 * Class Clock
 * @package Jeckel\Gherkin
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class Clock extends ContextAbstract
{
    /** @var array */
    protected $requiredFields = ['clock_path'];

    // disable all inherited actions
    public static $includeInheritedActions = false;

    /** @var string */
    protected $projectDir = null;

    /**
     * @return string
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getProjectDir(): string
    {
        if (empty($this->projectDir)) {
            return Configuration::projectDir();
        }
        return $this->projectDir;
    }

    /**
     * @param string $projectDir
     * @return Clock
     */
    public function setProjectDir(string $projectDir): Clock
    {
        $this->projectDir = $projectDir;
        return $this;
    }

    /**
     * @Given I set fake clock to :clock
     * @param string $clock
     */
    public function setFakeClockTo(string $clock)
    {
        file_put_contents($this->projectDir . $this->config['clock_path'], $clock);
    }
}
