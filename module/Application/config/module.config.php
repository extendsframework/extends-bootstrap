<?php
declare(strict_types=1);

namespace Application;

use Application\Controller\ApplicationController;
use Application\Task\ApplicationTask;
use ExtendsFramework\ServiceLocator\Resolver\Invokable\InvokableResolver;
use ExtendsFramework\ServiceLocator\Resolver\Reflection\ReflectionResolver;
use ExtendsFramework\ServiceLocator\ServiceLocatorInterface;

return [
    ServiceLocatorInterface::class => [
        InvokableResolver::class => [
            ApplicationController::class => ApplicationController::class,
        ],
        ReflectionResolver::class => [
            ApplicationTask::class => ApplicationTask::class,
        ],
    ],
];
