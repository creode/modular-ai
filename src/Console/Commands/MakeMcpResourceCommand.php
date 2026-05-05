<?php

declare(strict_types=1);

namespace Creode\ModularAi\Console\Commands;

use InterNACHI\Modularize\ModularizeGeneratorCommand;
use Laravel\Mcp\Console\Commands\MakeResourceCommand as BaseMakeResourceCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'make:mcp-resource',
    description: 'Create a new MCP resource class'
)]
class MakeMcpResourceCommand extends BaseMakeResourceCommand
{
    use ModularizeGeneratorCommand {
        ModularizeGeneratorCommand::getDefaultNamespace as modularizeGetDefaultNamespace;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $this->modularizeGetDefaultNamespace($rootNamespace);
    }
}
