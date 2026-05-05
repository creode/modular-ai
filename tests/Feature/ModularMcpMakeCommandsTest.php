<?php

namespace Creode\ModularAi\Tests\Feature;

use Creode\ModularAi\Console\Commands\MakeMcpAppResourceCommand;
use Creode\ModularAi\Console\Commands\MakeMcpPromptCommand;
use Creode\ModularAi\Console\Commands\MakeMcpResourceCommand;
use Creode\ModularAi\Console\Commands\MakeMcpServerCommand;
use Creode\ModularAi\Console\Commands\MakeMcpToolCommand;
use Creode\ModularAi\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\Attributes\DataProvider;

class ModularMcpMakeCommandsTest extends TestCase
{
    public function test_mcp_make_commands_are_overridden_by_modular_ai_module(): void
    {
        $this->artisan('list')->assertExitCode(0);

        $commands = Artisan::all();

        $this->assertInstanceOf(MakeMcpToolCommand::class, $commands['make:mcp-tool']);
        $this->assertInstanceOf(MakeMcpServerCommand::class, $commands['make:mcp-server']);
        $this->assertInstanceOf(MakeMcpResourceCommand::class, $commands['make:mcp-resource']);
        $this->assertInstanceOf(MakeMcpPromptCommand::class, $commands['make:mcp-prompt']);
        $this->assertInstanceOf(MakeMcpAppResourceCommand::class, $commands['make:mcp-app-resource']);
    }

    #[DataProvider('mcpMakeCommands')]
    public function test_mcp_make_commands_have_a_required_module_option(string $commandName): void
    {
        $this->artisan('list')->assertExitCode(0);

        $command = Artisan::all()[$commandName];
        $definition = $command->getDefinition();

        $this->assertTrue($definition->hasOption('module'));

        $option = $definition->getOption('module');

        $this->assertSame('module', $option->getName());
        $this->assertTrue($option->isValueRequired());
    }

    /**
     * @return array<string, array{0: string}>
     */
    public static function mcpMakeCommands(): array
    {
        return [
            'make:mcp-tool' => ['make:mcp-tool'],
            'make:mcp-server' => ['make:mcp-server'],
            'make:mcp-resource' => ['make:mcp-resource'],
            'make:mcp-prompt' => ['make:mcp-prompt'],
            'make:mcp-app-resource' => ['make:mcp-app-resource'],
        ];
    }
}
