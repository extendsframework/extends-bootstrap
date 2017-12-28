<?php
declare(strict_types=1);

use Application\ApplicationModule;
use ExtendsFramework\Application\ApplicationBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

chdir(dirname(__DIR__));

/** @noinspection PhpUnhandledExceptionInspection */
(new ApplicationBuilder())
    ->addGlobalConfigPath(__DIR__ . '/../config/{,*.}{global,local}.php')
    ->setCacheLocation(__DIR__ . '/../data/cache')
    ->setCacheEnabled(getenv('CACHE_ENABLED') === 'true')
    ->addModule(
        new ApplicationModule()
    )
    ->build()
    ->bootstrap();
