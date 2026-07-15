# Application Architecture

This application is built with Alight. It contains application code and
configuration, while framework and optional admin-panel behavior are provided
through Composer dependencies.

## Request Flow

```text
public/index.php
  -> app/bootstrap.php
  -> Alight\App::start()
  -> config/app.php
  -> config/route/*.php
  -> controller
  -> service/model
  -> response
```

The web server document root must be `public/`. `app/bootstrap.php` loads the
Composer autoloader and starts Alight. Alight then loads application
configuration and dispatches the matching route.

## Responsibilities

Controllers translate HTTP input into calls to application services and return
responses. They should not contain reusable business rules.

Services contain business workflows that may be reused by controllers, jobs,
or admin actions.

Models contain application-specific data access. Database credentials and
environment configuration belong in the generated `config/app.php`, never in
source code.

Jobs provide callable scheduled work. Their schedules are registered in
`config/job.php` and started through `app/scheduler.php` under PHP CLI.

Routes declare URL-to-callable mappings in `config/route`. Use class callables
so IDEs and static analysis can resolve controller references.

## Dependency Boundaries

Application work must not patch `vendor/juneszh/alight` or
`vendor/juneszh/alight-admin`. If application requirements reveal a dependency
defect, fix it in the dependency's source repository and then update the
application to a validated package version.
