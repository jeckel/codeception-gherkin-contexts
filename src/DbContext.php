<?php

namespace Jeckel\Gherkin;

use Behat\Gherkin\Node\TableNode;
use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module\Db;

/**
 * Class DbContext
 * @package Jeckel\Gherkin
 */
class DbContext extends ContextAbstract implements DependsOnModule
{
    /** @var Db */
    protected $dbc;

    // phpcs:disable
    /**
     * @return array|mixed
     */
    public function _depends()
    {
        return [
            Db::class => "Db module required",
        ];
    }
    // phpcs:enable

    // phpcs:disable
    /**
     * @param Db $dbc
     */
    public function _inject(Db $dbc)
    {
        $this->dbc = $dbc;
    }
    // phpcs:enable
}
