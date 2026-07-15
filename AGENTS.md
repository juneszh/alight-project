# Alight Application Guide

## Purpose

This project is a web application built with the Alight framework. Keep changes
focused on application behavior and use the public APIs provided by Composer
dependencies.

The dependency versions and PHP requirement in `composer.json` are the
authoritative runtime contract. Do not assume APIs from a different Alight
version.

## Application Structure

- `app/controller`: HTTP entry points. Keep controllers thin.
- `app/service`: reusable business logic and application workflows.
- `app/model`: application-specific data access.
- `app/job`: scheduled job handlers.
- `app/view`: server-rendered templates.
- `config/route`: route declarations.
- `config/app.php`: local application configuration and credentials.
- `config/app.example.php`: safe distributable configuration defaults.
- `public`: web document root and public assets.
- `storage`: generated cache, logs, and runtime data.

Application namespaces are defined in `composer.json`:

| Namespace | Directory |
| --- | --- |
| `ctr\` | `app/controller` |
| `svc\` | `app/service` |
| `mod\` | `app/model` |
| `job\` | `app/job` |

## Request Flow

Requests enter through `public/index.php`, load `app/bootstrap.php`, and start
Alight. Alight reads `config/app.php`, imports the configured route files, and
dispatches the matching controller callable.

Use class callables in route files so IDEs and static analysis can resolve them:

```php
use Alight\Route;

Route::get('/', [\ctr\Page::class, 'index']);
```

## Coding Rules

- Add `declare(strict_types=1);` to new PHP source files.
- Use PHP 8.3 native types for constants, properties, parameters, and return
  values. Use `mixed` when a value is genuinely unconstrained instead of
  omitting its type.
- Use constructor property promotion and `readonly` for immutable dependencies
  or state.
- Fluent instance methods return `static`, side-effect-only methods return
  `void`, and methods that always terminate return `never`.
- Use PHPDoc for array shapes, generics, callback contracts, and behavior that
  native types cannot express; do not repeat obvious native types.
- Keep trailing commas in multiline arrays and argument lists.
- Follow PSR-4 namespaces and the existing directory naming convention.
- Keep request parsing and response selection in controllers.
- Put reusable business rules in services rather than controllers or route
  files.
- Keep data-access details in models when the logic is application-specific.
- Use Alight public classes; never patch files under `vendor/`.
- Preserve existing application behavior unless the task explicitly changes
  it.
- Never commit passwords, tokens, production hostnames, or other secrets.
- When adding a configuration option, document it in `config/app.example.php`
  with a safe default.

## Alight-Admin

Alight-Admin is optional. Do not assume its classes or generated configuration
exist unless `juneszh/alight-admin` is present in `composer.json`.

When it is installed:

- Admin routes live in `config/route/admin.php`.
- Admin menus and console charts live under `config/admin`.
- Application-specific admin controllers live under `app/controller/admin`.
- Authorization checks must remain in protected admin handlers.

## Generated and Sensitive Files

- `config/app.php` is generated from `config/app.example.php`; treat it as local
  and potentially sensitive.
- `storage` contains runtime output and must not be used as source code.
- `vendor` and published admin assets are dependency or build output; modify
  their source packages instead of editing generated copies.

## Validation

Run the complete project check before considering a change finished:

```bash
composer check
```

Run only PHP syntax validation with:

```bash
composer lint
```

Run static analysis only with:

```bash
composer analyse
```

Fix PHPStan findings at their source. Do not generate a baseline or add ignore
comments merely to make the check pass.

If dependencies change, run Composer validation and make sure
`composer.lock` matches the intended constraints.

## Definition of Done

- The application bootstrap and configured routes remain loadable.
- New and changed PHP files pass `composer check`.
- Documentation examples use real paths, namespaces, and method signatures.
- Configuration examples contain no secrets.
- No runtime output, generated dependencies, or unrelated changes are included.
