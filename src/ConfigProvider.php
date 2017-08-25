<?php
/**
 * @see https://github.com/dotkernel/dot-mail/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-mail/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Toolbox;

use Dot\Toolbox\Command\MakeFormCommand;
use Dot\Toolbox\Command\MakeEntityCommand;
use Dot\Toolbox\Command\MakeMapperCommand;
use Dot\Toolbox\Command\MakeFactoryCommand;
use Dot\Toolbox\Command\MakeServiceCommand;
use Dot\Toolbox\Command\MakeControllerCommand;

/**
 * Class ConfigProvider
 * @package Dot\Toolbox
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dot_console' => $this->getCommands(),
        ];
    }

    public function getCommands()
    {
        return [
            'commands' => [
                [
                    'name' => 'make:controller <name> <package>',
                    'description' => 'Generate an Controller',
                    'handler' => MakeControllerCommand::class,
                ],
                [
                    'name' => 'make:entity <name> <package>',
                    'description' => 'Generate an Entity',
                    'handler' => MakeEntityCommand::class,
                ],
                [
                    'name' => 'make:factory <name> <package>',
                    'description' => 'Generate a Factory',
                    'handler' => MakeFactoryCommand::class,
                ],
                [
                    'name' => 'make:form <name> <package>',
                    'description' => 'Generate an Form',
                    'handler' => MakeFormCommand::class,
                ],
                [
                    'name' => 'make:mapper <name> <package> <table>',
                    'description' => 'Generate a mapper',
                    'handler' => MakeMapperCommand::class,
                ],
                [
                    'name' => 'make:service <name> <package>',
                    'description' => 'Generate a Service',
                    'handler' => MakeServiceCommand::class,
                ],
            ],
        ];
    }
}
