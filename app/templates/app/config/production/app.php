<?php

$config = include __DIR__.'/../app.php';
$config['twig.options'] = array('cache' => BASEPATH.'/storage/cache/twig');
$config['debug'] = false;

return $config;