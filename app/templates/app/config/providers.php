<?php

return [
    'providers' => [
        ['class'=>'Silex\Provider\ServiceControllerServiceProvider'],
        ['class'=>'Silex\Provider\TwigServiceProvider','value' => ['twig.path' => [ APPPATH.'/views',APPPATH.'/templates']]],
        ['class'=>'Silex\Provider\UrlGeneratorServiceProvider'],
        ['class'=>'MJanssen\Provider\RoutingServiceProvider'],
    ]
];