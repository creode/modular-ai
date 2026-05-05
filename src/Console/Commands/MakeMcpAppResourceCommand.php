<?php

declare(strict_types=1);

namespace Creode\ModularAi\Console\Commands;

use InterNACHI\Modular\Support\ModuleConfig;
use InterNACHI\Modularize\ModularizeGeneratorCommand;
use Laravel\Mcp\Console\Commands\MakeAppResourceCommand as BaseMakeAppResourceCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(
    name: 'make:mcp-app-resource',
    description: 'Create a new MCP app resource class and linked view'
)]
class MakeMcpAppResourceCommand extends BaseMakeAppResourceCommand
{
    use ModularizeGeneratorCommand {
        ModularizeGeneratorCommand::getDefaultNamespace as modularizeGetDefaultNamespace;
    }

    protected function buildClass($name): string
    {
        $viewName = collect(explode('/', $this->getKebabName()))
            ->implode('.');

        $class = parent::buildClass($name);

        $module = $this->module();

        if (! $module) {
            return $class;
        }

        return str_replace(
            "'mcp.{$viewName}'",
            "'{$module->name}::mcp.{$viewName}'",
            $class,
        );
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $this->modularizeGetDefaultNamespace($rootNamespace);
    }

    protected function getViewPath(): string
    {
        $module = $this->module();

        if (! $module) {
            return parent::getViewPath();
        }

        return $this->getModuleViewPath($module);
    }

    protected function getModuleViewPath(ModuleConfig $module): string
    {
        return $module->path('resources/views/mcp/'.$this->getKebabName().'.blade.php');
    }
}
