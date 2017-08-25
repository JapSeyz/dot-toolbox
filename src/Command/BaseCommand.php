<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace Dot\Toolbox\Command;

use Dot\Console\Command\AbstractCommand;

/**
 * Class BaseCommand
 * @package Dot\Toolbox\Command
 */
abstract class BaseCommand extends AbstractCommand
{
    protected $configPath;
    protected $stubPath;
    protected $rootPath;
    protected $srcPath;
    protected $failure;
    protected $output;

    public function __construct()
    {
        $this->stubPath = \dirname(__DIR__, 1).'/stubs';
        $this->rootPath = \dirname(__DIR__, 5);
        $this->srcPath = $this->rootPath.'/src';
        $this->configPath = $this->rootPath.'/config/toolbox.php';
        $this->output = [];
        $this->failure = 0;
    }

    protected function resolveVariables($stub, $variables)
    {
        foreach ($variables as $key => $value) {
            $stub = \preg_replace('/\${'.$key.'}/', $value, $stub);
        }

        return $stub;
    }

    protected function generateFile($console, $matches, $type)
    {
        $stub = \file_get_contents($this->stubPath.'/'.\strtolower($type).'.stub');

        $stub = $this->resolveVariables($stub, $matches);
        $path = $this->srcPath.'/'.$matches['package'].'/src/'.\ucfirst($type).'/'.$matches['name'].'.php';

        if (\file_exists($path)) {
            $console->write('A(n) '.\ucfirst($type).' with that name already exists in the package');

            return 0;
        }

        \file_put_contents($path, $stub);
        $console->write('The '.\ucfirst($type).': '.$matches['name'].' has been created');
    }
}
