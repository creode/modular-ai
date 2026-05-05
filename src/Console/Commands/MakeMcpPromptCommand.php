<?php

declare(strict_types=1);

namespace Creode\ModularAi\Console\Commands;

use InterNACHI\Modularize\ModularizeGeneratorCommand;
use Laravel\Mcp\Console\Commands\MakePromptCommand as BaseMakePromptCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'make:mcp-prompt',
    description: 'Create a new MCP prompt class'
)]
class MakeMcpPromptCommand extends BaseMakePromptCommand
{
    use ModularizeGeneratorCommand {
        ModularizeGeneratorCommand::getDefaultNamespace as modularizeGetDefaultNamespace;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $this->modularizeGetDefaultNamespace($rootNamespace);
    }
}
