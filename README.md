# Alight-Project
Alight-Project is a project template with [Alight framework](https://github.com/juneszh/alight), which helps users to quickly build the directory structure of the project and create an admin panel by [Alight-Admin](https://github.com/juneszh/alight-admin), it is very suitable for beginners.

## Alight Family

| Project                                                     | Description                                                                       |
| ----------------------------------------------------------- | --------------------------------------------------------------------------------- |
| [Alight](https://github.com/juneszh/alight)                 | Basic framework built-in routing, database, caching, etc.                         |
| [Alight-Admin](https://github.com/juneszh/alight-admin)     | A full admin panel extension based on Alight. No front-end coding required.       |
| [Alight-Project](https://github.com/juneszh/alight-project) | A template for beginner to easily create web applications by Alight/Alight-Admin. |

## Requirements
PHP 7.4+

## Usage
```bash
$ composer create-project juneszh/alight-project {PROJECT_DIRECTORY}
```

## Directory Structure
* `app/` *Contains the core code of your application.*
    * `controller/` *Contains controllers that handle requests (MVC pattern).*
    * `job/` *Contains jobs run by the time-based scheduler.*
    * `model/` *Contains models of database (MVC pattern).*
    * `service/` *Contains the business logics.*
    * `view/` *Contains views with page templates (MVC pattern).*
    * `bootstrap.php` *The web bootstraps.*
    * `scheduler.php` *Job scheduler run by CRON.*
* `config/` *Contains all of application's configuration files.*
    * `admin/` *Contains the admin's menu and console configuration.*
    * `route/` *Contains the route's configuration.*
    * `app.php` *Application's configuration.*
    * `job.php` *Job scheduler's configuration.*
* `public/` *Contains the index.php file and assets such as images, JavaScript, and CSS.*
    * `favicon.ico` *Icon for the web application.*
    * `index.php` *Entry point for all requests entering the web application.*
* `storage/` *Contains logs, route caches, file caches, and other files generated by the framework.*
* `vendor/` *Contains composer dependencies.*

## Shortcut Namespaces
The classes in the application are always called from the business code, so we define some shortcut namespaces to improve coding efficiency.
| Namespace | Directory        |
| --------- | ---------------- |
| `ctr`     | `app/controller` |
| `job`     | `app/job`        |
| `mod`     | `app/model`      |
| `svc`     | `app/service`    |

For example:
```php
// The route handler points to function 'index' in app/Controllers/Pages.php
Alight\Route::get('/', [\ctr\Pages::class, 'index']);
```

## Composer Scripts
The admin panel is not built by default when creating project, you need to do it with follow scripts: (Please make sure the [database has been configured](https://github.com/juneszh/alight#database))
```bash
$ cd {PROJECT_DIRECTORY}
$ composer require juneszh/alight-admin
$ composer run admin-install
$ composer run admin-download
```
List of scripts:
| Name             | Description                                                                                                                  |
| ---------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `admin-install`  | Initialize the runtime environment required by the [Alight-Admin](https://github.com/juneszh/alight-admin).                  |
| `admin-build`    | Build the admin panel front-end resources by npm packages. ([Node.js](https://nodejs.org/en/download/) required)             |
| `admin-download` | Download the admin panel front-end resources from [Alight-Admin releases](https://github.com/juneszh/alight-admin/releases). |

## License
* [MIT license](./LICENSE)