# Contributing to Alight-Project

This guide is for maintainers of the Alight-Project template. Applications
created from the template may remove this file if they do not need upstream
contribution instructions.

## Local Family Repositories

During family development, the repositories are commonly checked out as
sibling directories:

```text
alight/
alight-admin/
alight-project/
```

Treat each repository as a separate package with its own Git history:

- `alight` owns framework behavior and core public APIs.
- `alight-admin` owns admin PHP APIs and React resources.
- `alight-project` owns the generated application structure and defaults.

Do not make framework or admin fixes inside this template's `vendor` directory.

## Compatibility Workflow

When a change spans repositories, work in dependency order:

1. Implement and validate the Alight change.
2. Update and validate Alight-Admin against that Alight version when affected.
3. Update Alight-Project constraints, examples, and generated configuration.
4. Create a fresh project and verify installation from an empty directory.

Keep these contracts synchronized:

- Minimum PHP version.
- Composer dependency constraints and lock files.
- Configuration keys and default values.
- Public method signatures used in examples.
- Installation and build commands.

## Template Rules

- Every committed file may be copied into a newly created application.
- Application-facing PHP examples must model the project's PHP 8.3 native type
  conventions, including explicit return types.
- Keep defaults safe for development and production installation.
- Do not include local paths, credentials, or maintainer-specific environment
  assumptions in application-facing files.
- `AGENTS.md` must remain useful inside the generated application.
- README examples must match the current local framework implementations.

## Validation

Run:

```bash
composer check
```

The command includes Composer validation, PHP syntax checks, and PHPStan. Do
not use a PHPStan baseline or ignore rules to hide new findings.

Set `ALIGHT_SOURCE_DIR=../alight/src` when validating against an unpublished
local Alight checkout.

When dependencies can be resolved from their intended distribution source,
also refresh and validate `composer.lock`. The current development line may use
local sibling repositories before the corresponding remote branches are
published; do not replace those local sources with an older remote package just
to refresh the lock file.

Before release, test the complete creation flow in a temporary directory:

```bash
composer create-project juneszh/alight-project APP_DIRECTORY
cd APP_DIRECTORY
composer check
```

If Alight-Admin is part of the release, also run its documented installation
and resource build or download flow in the fresh project.
