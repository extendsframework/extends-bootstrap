<?php
declare(strict_types=1);

use Application\Controller\ApplicationController;
use ExtendsFramework\Http\Router\Route\Path\PathRoute;
use ExtendsFramework\Http\Router\RouterInterface;

return [
    RouterInterface::class => [
        'routes' => [
            [
                'name' => PathRoute::class,
                'options' => [
                    'path' => '/',
                    'parameters' => [
                        'controller' => ApplicationController::class,
                        'action' => ApplicationController::ACTION_INDEX,
                    ],
                ],
            ],
        ],
    ],
];
