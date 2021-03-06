<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs([
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir
    ])
       ->register();

$loader->registerNamespaces([
    'Library' => $config->application->libraryDir,
    'MyForm'  => $config->application->formsDir,
])
       ->register();

// Use composer autoloader to load vendor classes
require_once BASE_PATH . '/vendor/autoload.php';