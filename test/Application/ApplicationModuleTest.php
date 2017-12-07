<?php
declare(strict_types=1);

namespace Application;

use Application\Controller\ApplicationController;
use ExtendsFramework\Router\Route\Path\PathRoute;
use ExtendsFramework\Router\RouterInterface;
use ExtendsFramework\ServiceLocator\Config\Loader\LoaderInterface;
use ExtendsFramework\ServiceLocator\Resolver\Invokable\InvokableResolver;
use ExtendsFramework\ServiceLocator\ServiceLocatorInterface;
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

        $this->assertInstanceOf(LoaderInterface::class, $config);
        if ($config instanceof LoaderInterface) {
            $this->assertSame([
                [
                    ServiceLocatorInterface::class => [
                        InvokableResolver::class => [
                            ApplicationController::class => ApplicationController::class,
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
            ], $config->load());
        }
    }
}
