Bugsnag Middleware for Cilex
==

The Bugsnag middleware for Cilex integrates into Cilex PHP applications.

[Bugsnag](https://bugsnag.com) captures errors in real-time from your web,
mobile and desktop applications, helping you to understand and resolve them
as fast as possible. [Create a free account](https://bugsnag.com) to start
capturing errors from your applications.

The Bugsnag middleware for Cilex supports Cilex 1.1+ and PHP 5.3+.

Installation
--

To get this middleware in to an existing project, the best way is to use
[Composer](http://getcomposer.org).

1. Add `bugsnag/bugsnag-cilex` as a Composer dependency in your project's
   [`composer.json`][composer-json] file:

    ```json
    {
      "require": {
        "evolution7/bugsnag-cilex": "*"
      }
    }
    ```

2. If you haven't already, download and [install Composer][composer-download]:

    ```bash
    curl -sS https://getcomposer.org/installer | php
    ```

3. [Install your Composer dependencies][composer-install]:

    ```bash
    php composer.phar install
    ```

4. Set up [Composer's autoloader][composer-loader]:

    ```php
    require_once 'vendor/autoload.php';
    ```

You're done! See the example application below that demonstrates basic usage.

[composer-json]: <http://getcomposer.org/doc/01-basic-usage.md#the-require-key>
    "More on the composer.json format"
[composer-download]: <http://getcomposer.org/doc/01-basic-usage.md#installation>
    "More detailed installation instructions on the Composer site"
[composer-install]: <http://getcomposer.org/doc/01-basic-usage.md#installing-dependencies>
    "More detailed instructions on the Composer site"
[composer-loader]: <http://getcomposer.org/doc/01-basic-usage.md#autoloading>
    "More information about the autoloader on the Composer site"

Example application
--

```php
<?php
require_once __DIR__.'/vendor/autoload.php';

$app = new Cilex\Application();

$app->register(new Bugsnag\Cilex\Provider\BugsnagServiceProvider, array(
    'bugsnag.options' => array(
        'apiKey' => '066f5ad3590596f9aa8d601ea89af845'
    )
));

$app->get('/hello/{name}', function($name) use($app) {
    throw new Exception("Hello!");
    return 'Hello '.$app->escape($name);
});

$app->run();
```

If you want to access the bugsnag client directly (for example, to configure it
or to send a crash report manually), you can use `$app['bugsnag']`.
