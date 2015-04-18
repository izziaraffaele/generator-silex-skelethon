<?php

return [
    'providers' => [
        ['class'=>'Silex\Provider\ServiceControllerServiceProvider'],
        ['class'=>'Silex\Provider\TwigServiceProvider'],
        ['class'=>'Silex\Provider\UrlGeneratorServiceProvider'],
        ['class'=>'MJanssen\Provider\RoutingServiceProvider'],
    ]
];