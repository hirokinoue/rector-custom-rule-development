<?php

declare(strict_types=1);

namespace Utils\Rector\Tests\Rector\MyFirstRector\Config;

use Rector\Config\RectorConfig;
use Utils\Rector\Rector\MyFirstRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(MyFirstRector::class);
};