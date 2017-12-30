<?php
declare(strict_types=1);

namespace Application;

use Application\Task\ApplicationTask;
use ExtendsFramework\Shell\ShellInterface;

return [
    ShellInterface::class => [
        'commands' => [
            [
                'name' => 'greet',
                'description' => 'Greet the user who invoked me!',
                'options' => [
                    [
                        'name' => 'name',
                        'description' => 'Name of the user.',
                        'short' => 'n',
                        'long' => 'name',
                        'flag' => false,
                    ],
                ],
                'parameters' => [
                    'task' => ApplicationTask::class,
                ],
            ],
        ],
    ],
];
