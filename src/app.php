<?php
use \Doctrine\Common\Cache\ApcCache;
use \Doctrine\Common\Cache\ArrayCache;

// Register Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    // Doctrine DBAL settings goes here
));

// Register Doctrine ORM
$app->register(new Nutwerk\Provider\DoctrineORMServiceProvider(), array(
    'db.orm.proxies_dir'           => __DIR__ . '/cache/doctrine/proxy',
    'db.orm.proxies_namespace'     => 'DoctrineProxy',
    'db.orm.cache'                 => __DIR__ . '/cache',
    !$app['debug'] && extension_loaded('apc') ? new ApcCache() : new ArrayCache(),
    'db.orm.auto_generate_proxies' => true,
    'db.orm.entities'              => array(array(
        'type'      => 'annotation',       // entity definition
        'path'      => __DIR__ . '/src',   // path to your entity classes
        'namespace' => 'Bugs\Entity', // your classes namespace
    )),
));
