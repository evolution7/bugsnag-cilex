<?php
namespace Evolution7\Cilex\Provider;

use Cilex\Application;
use Cilex\ServiceProviderInterface;

class BugsnagServiceProvider implements ServiceProviderInterface
{
    private static $request;

    public function register(Application $app)
    {
        $app['bugsnag'] = $app->share(function () use($app) {
            $client = new \Bugsnag_Client($app['bugsnag.options']['apiKey']);
            set_error_handler(array($client, 'errorhandler'));
            set_exception_handler(array($client, 'exceptionhandler'));
            return $client;
        });
    }
}
