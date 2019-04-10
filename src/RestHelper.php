<?php
namespace Jeckel\GherkinHelper;

use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module;
use Codeception\Module\REST;

class RestHelper extends Module implements DependsOnModule
{
    /** @var REST */
    protected $rest;

    // phpcs:disable
    /**
     * @return array
     */
    public function _depends()
    {
        return [
            REST::class => "REST module required"
        ];
    }
    // phpcs:enable

    // phpcs:disable
    /**
     * @param REST $rest
     */
    public function _inject(REST $rest)
    {
        $this->rest = $rest;
    }
    // phpcs:enable
}
