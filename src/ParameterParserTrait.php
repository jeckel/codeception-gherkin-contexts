<?php

namespace Jeckel\Gherkin;

use Behat\Gherkin\Node\TableNode;

/**
 * Class ParameterParser
 * @package Jeckel\Gherkin
 */
trait ParameterParserTrait
{
    /**
     * @param TableNode $tableNode
     * @return array
     */
    public static function parseTableNode(TableNode $tableNode): array
    {
        $parameters = [];
        foreach ($tableNode->getRows() as $index => $row) {
            if ($index === 0) { // first row to define fields
                continue;
            }
            $parameters[$row[0]] = $row[1];
        }
        return $parameters;
    }
}
