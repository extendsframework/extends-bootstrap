<?php
declare(strict_types=1);

use Application\ApplicationModule;
use ExtendsFramework\Application\ApplicationBuilder;
use ExtendsFramework\Application\Framework\ServiceLocator\Loader\ApplicationConfigLoader;
use ExtendsFramework\Console\Framework\ServiceLocator\Loader\ConsoleConfigLoader;
use ExtendsFramework\Http\Framework\ServiceLocator\Loader\HttpConfigLoader;
use ExtendsFramework\Logger\Framework\ServiceLocator\Loader\LoggerConfigLoader;
use ExtendsFramework\Security\Framework\ServiceLocator\Loader\SecurityConfigLoader;

require_once __DIR__ . '/../vendor/autoload.php';

chdir(dirname(__DIR__));

/** @noinspection PhpUnhandledExceptionInspection */
(new ApplicationBuilder())
    ->addGlobalConfigPath(__DIR__ . '/../config/{,*.}{global,local}.php')
    ->setCacheLocation(__DIR__ . '/../data/cache')
    ->setCacheEnabled(getenv('CACHE_ENABLED') === 'true')
    ->addConfig(
        new LoggerConfigLoader(),
        new ApplicationConfigLoader(),
        new HttpConfigLoader(),
        new ConsoleConfigLoader(),
        new SecurityConfigLoader()
    )
    ->addModule(
        new ApplicationModule()
    )
    ->build()
    ->bootstrap();
