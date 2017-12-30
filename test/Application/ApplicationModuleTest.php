<?php
declare(strict_types=1);

namespace Application;

use Application\Controller\ApplicationController;
use Application\Task\ApplicationTask;
use ExtendsFramework\Router\Route\Path\PathRoute;
use ExtendsFramework\Router\RouterInterface;
use ExtendsFramework\ServiceLocator\Resolver\Invokable\InvokableResolver;
use ExtendsFramework\ServiceLocator\Resolver\Reflection\ReflectionResolver;
use ExtendsFramework\ServiceLocator\ServiceLocatorInterface;
use ExtendsFramework\Shell\ShellInterface;
use PHPUnit\Framework\TestCase;

class ApplicationModuleTest extends TestCase
{
    /**
     * Get config.
     *
     * Test that correct config will be loaded.
     *
     * @covers \Application\ApplicationModule::getConfig()
     */
    public function testGetConfig(): void
    {
        $module = new ApplicationModule();
        $config = $module->getConfig();

        $this->assertSame([
            [
                ServiceLocatorInterface::class => [
                    InvokableResolver::class => [
                        ApplicationController::class => ApplicationController::class,
                    ],
                    ReflectionResolver::class => [
                        ApplicationTask::class => ApplicationTask::class,
                    ],
                ],
            ],
            [
                RouterInterface::class => [
                    'routes' => [
                        [
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
            ],
            [
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
            ],
        ], $config->load());
    }
}
