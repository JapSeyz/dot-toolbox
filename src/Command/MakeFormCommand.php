<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace Dot\Toolbox\Command;

use ZF\Console\Route;
use Zend\Console\Adapter\AdapterInterface;

/**
 * Class MakeFormCommand
 * @package Dot\Toolbox\Command
 */
class MakeFormCommand extends BaseCommand
{
    /**
     * @param Route $route
     * @param AdapterInterface $console
     * @return int
     */
    public function __invoke(Route $route, AdapterInterface $console)
    {
        // Fetch command arguments
        $matches = $route->getMatches();

        $this->generateFile($console, $matches, 'Form');

        return 0;
    }
}
