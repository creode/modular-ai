# Modular AI (MCP generators for Modular)

This module adds MCP “make” Artisan commands that play nicely with **Internachi Modular** module structure.

Modular upstream: `https://github.com/InterNACHI/modular`

It’s packaged as `creode/modular-ai` and auto-registers its service provider via Composer.

---

## What it provides

When running in console, the module registers these Artisan commands:

- `make:mcp-tool`
- `make:mcp-server`
- `make:mcp-resource`
- `make:mcp-prompt`
- `make:mcp-app-resource`

These commands generate MCP classes in the appropriate module directories rather than assuming a non-modular Laravel app layout.

---

## Usage

```bash
php artisan make:mcp-tool ExampleTool
php artisan make:mcp-server ExampleServer
php artisan make:mcp-resource ExampleResource
php artisan make:mcp-prompt ExamplePrompt
php artisan make:mcp-app-resource ExampleAppResource
```

See command options:

```bash
php artisan make:mcp-tool --help
```

---

## Development notes

- The commands are registered by `Creode\ModularAi\Providers\ModularAiServiceProvider` and only load when `runningInConsole()`.

---

## License

This module declares a **proprietary** license in its `composer.json`.
