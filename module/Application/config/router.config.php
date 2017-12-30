<?php
declare(strict_types=1);

namespace Application;

use Application\Controller\ApplicationController;
use ExtendsFramework\Router\Route\Path\PathRoute;
use ExtendsFramework\Router\Route\Query\QueryRoute;
use ExtendsFramework\Router\RouterInterface;
use ExtendsFramework\Validator\Type\StringValidator;

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
                'abstract' => false,
                'children' => [
                    'query' => [
                        'name' => QueryRoute::class,
                        'options' => [
                            'validators' => [
                                'name' => StringValidator::class,
                            ],
                            'parameters' => [
                                'name' => 'stranger',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
