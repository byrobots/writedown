<?php

// Get WriteDown's container.
$container = $writedown->getContainer();

// Define additional services.
$container->addServiceProvider(\App\Providers\AdminControllerServiceProvider::class);
$container->addServiceProvider(\App\Providers\APIControllerServiceProvider::class);

// Set-up Twig
$twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__ . '/../app/Views'), []);

switch (getenv('ENVIRONMENT')) {
    case 'development':
        $manifestFile = 'http://localhost:8080/dist/manifest.json';
        break;
    default:
        $manifestFile = __DIR__ . '/../public/dist/manifest.json';
}

$twig->addExtension(new \ByRobots\TwigWebpackManifestExtension\WebpackExtension($manifestFile));
$container->add('view', $twig);
