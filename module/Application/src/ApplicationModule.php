<?php
declare(strict_types=1);

namespace Application;

use ExtendsFramework\Application\Module\ModuleInterface;
use ExtendsFramework\Application\Module\Provider\ConfigProviderInterface;
use ExtendsFramework\ServiceLocator\Config\Loader\File\FileLoader;
use ExtendsFramework\ServiceLocator\Config\Loader\LoaderInterface;

class ApplicationModule implements ModuleInterface, ConfigProviderInterface
{
    /**
     * Get application module config.
     *
     * @return LoaderInterface
     */
    public function getConfig(): LoaderInterface
    {
        return new FileLoader(__DIR__ . '/../config/*.config.php');
    }
}
