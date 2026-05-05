# Modular AI (MCP generators for Modular)

This module adds MCP “make” Artisan commands that play nicely with **Internachi Modular** module structure.

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

## Usage (in this repo, via DDEV)

From the project root:

```bash
ddev exec php artisan make:mcp-tool ExampleTool
ddev exec php artisan make:mcp-server ExampleServer
ddev exec php artisan make:mcp-resource ExampleResource
ddev exec php artisan make:mcp-prompt ExamplePrompt
ddev exec php artisan make:mcp-app-resource ExampleAppResource
```

See command options:

```bash
ddev exec php artisan make:mcp-tool --help
```

---

## Development notes

- The commands are registered by `Creode\ModularAi\Providers\ModularAiServiceProvider` and only load when `runningInConsole()`.
- Tests live under `app-modules/modular-ai/tests`.

---

## License

This module declares a **proprietary** license in its `composer.json`.
