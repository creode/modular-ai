<?php

declare(strict_types=1);

namespace Creode\ModularAi\Console\Commands;

use InterNACHI\Modularize\ModularizeGeneratorCommand;
use Laravel\Mcp\Console\Commands\MakeToolCommand as BaseMakeToolCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'make:mcp-tool',
    description: 'Create a new MCP tool class'
)]
class MakeMcpToolCommand extends BaseMakeToolCommand
{
    use ModularizeGeneratorCommand {
        ModularizeGeneratorCommand::getDefaultNamespace as modularizeGetDefaultNamespace;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $this->modularizeGetDefaultNamespace($rootNamespace);
    }
}
