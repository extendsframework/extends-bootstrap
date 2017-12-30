<?php
declare(strict_types=1);

namespace Application;

use Application\Controller\ApplicationController;
use ExtendsFramework\Router\Route\Path\PathRoute;
use ExtendsFramework\Router\RouterInterface;

return [
    RouterInterface::class => [
        'routes' => [
            'index' => [
                'name' => PathRoute::class,
                'options' => [
                    'path' => '/',
                    'parameters' => [
                        'controller' => ApplicationController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
];
