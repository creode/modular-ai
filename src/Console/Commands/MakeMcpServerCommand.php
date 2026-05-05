<?php

declare(strict_types=1);

namespace Creode\ModularAi\Console\Commands;

use InterNACHI\Modularize\ModularizeGeneratorCommand;
use Laravel\Mcp\Console\Commands\MakeServerCommand as BaseMakeServerCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'make:mcp-server',
    description: 'Create a new MCP server class'
)]
class MakeMcpServerCommand extends BaseMakeServerCommand
{
    use ModularizeGeneratorCommand {
        ModularizeGeneratorCommand::getDefaultNamespace as modularizeGetDefaultNamespace;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $this->modularizeGetDefaultNamespace($rootNamespace);
    }
}
