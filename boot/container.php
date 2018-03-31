<?php

// Get WriteDown's container
$container = $writedown->getContainer();

// Include service providers
$container->addServiceProvider(WriteDown\Providers\APIServiceProvider::class);
$container->addServiceProvider(WriteDown\Providers\HTTPServiceProvider::class);
$container->addServiceProvider(App\Http\Providers\ControllerServiceProvider::class);

// Define additional services
$container->add('Doctrine\ORM\EntityManagerInterface', function() {
    $configBuilder = new \WriteDown\Database\DoctrineConfigBuilder;
    $database      = new \WriteDown\Database\DoctrineDriver($configBuilder->generate());
    return $database->getManager();
});

$container->add('view', new \Slim\Views\PhpRenderer('../app/Views'));
