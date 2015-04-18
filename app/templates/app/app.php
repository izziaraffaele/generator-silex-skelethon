<?php
// Silex stuff
use Silex\Application;
use Symfony\Component\Debug\Debug;

// Application
use MJanssen\Provider\ServiceRegisterProvider;
use Whoops\Provider\Silex\WhoopsServiceProvider;
use WebComposer\Provider\ConfigServiceProvider;
use WebComposer\Provider\ErrorHandlerServiceProvider;

//register silex app
$app = new Application();
$app->register(new ConfigServiceProvider());

$app['config']->loadFile('app.php');
$app['config']->loadFile('controllers.php');
$app['config']->loadFile('providers.php');
$app['config']->loadFile('routes.json');
$app['debug'] = $app['config']->getItem('debug');

$app->register(new ErrorHandlerServiceProvider());

if( $app['debug'] )
{
    // manually register whoops error handler
    $app->register(new WhoopsServiceProvider(),[
        'whoops.error_page_handler' => 'sublime'
    ]);
    // $app['whoops'] = $app->extend('whoops', function ($whoops) {
    //     $whoops->pushHandler(new DeleteWholeProjectHandler());
    //     return $whoops;
    // });
}

$serviceRegisterProvider = new ServiceRegisterProvider();
$serviceRegisterProvider->registerServiceProvider($app, $app['config']->getItem('providers'));
$serviceRegisterProvider->registerServiceProvider($app, $app['config']->getItem('controllers'));

return $app;