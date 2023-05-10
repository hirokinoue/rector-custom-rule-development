<?php

declare(strict_types=1);

use Utils\Rector\Rector\MyFirstRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Core\Configuration\Option;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->skip([
        __DIR__ . '/src/exclude-dir',
    ]);

//    $rectorConfig->cacheDirectory(__DIR__ . '/cache');

    // register rules
    $rectorConfig->rules([
        MyFirstRector::class,
    ]);

    $rectorConfig->fileExtensions(['php']);

    // Xdebugを使う時は並行処理を無効化する
    $rectorConfig->disableParallel();

    // define parallel config
//    $rectorConfig->parallel(60 * 60 * 3, 16, 100);

     // define sets of rules
//    $rectorConfig->sets([
//        LevelSetList::UP_TO_PHP_73
//    ]);

    // define options
//    $parameters = $rectorConfig->parameters();
//    $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/phpstan.neon');
};
