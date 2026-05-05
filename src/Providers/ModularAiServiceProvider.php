<?php

namespace Creode\ModularAi\Providers;

use Creode\ModularAi\Console\Commands\MakeMcpAppResourceCommand;
use Creode\ModularAi\Console\Commands\MakeMcpPromptCommand;
use Creode\ModularAi\Console\Commands\MakeMcpResourceCommand;
use Creode\ModularAi\Console\Commands\MakeMcpServerCommand;
use Creode\ModularAi\Console\Commands\MakeMcpToolCommand;
use Illuminate\Console\Application as ArtisanApplication;
use Illuminate\Support\ServiceProvider;

class ModularAiServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $registerCommands = function (ArtisanApplication $artisan): void {
            $artisan->add($this->app->make(MakeMcpToolCommand::class));
            $artisan->add($this->app->make(MakeMcpServerCommand::class));
            $artisan->add($this->app->make(MakeMcpResourceCommand::class));
            $artisan->add($this->app->make(MakeMcpPromptCommand::class));
            $artisan->add($this->app->make(MakeMcpAppResourceCommand::class));
        };

        ArtisanApplication::starting($registerCommands);

        if ($this->app->resolved('artisan')) {
            /** @var ArtisanApplication $artisan */
            $artisan = $this->app->make('artisan');

            $registerCommands($artisan);
        }
    }
}
