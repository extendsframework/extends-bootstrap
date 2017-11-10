<?php
declare(strict_types=1);

use Application\Controller\ApplicationController;
use ExtendsFramework\ServiceLocator\Resolver\Invokable\InvokableResolver;
use ExtendsFramework\ServiceLocator\ServiceLocatorInterface;

return [
    ServiceLocatorInterface::class => [
        InvokableResolver::class => [
            ApplicationController::class => ApplicationController::class
        ]
    ]
];
