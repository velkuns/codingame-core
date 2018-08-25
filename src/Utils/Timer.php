<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Utils;

use Velkuns\Codingame\Core\Logger\Logger;

/**
 * Class Timer
 *
 * @author Romain Cottard
 */
final class Timer
{
    /** @var array $timers */
    private static $timers = [];

    /**
     * @param string $name
     * @return void
     */
    public static function start(string $name = 'global'): void
    {
        static::$timers[$name] = -microtime(true);
    }

    /**
     * @param string $name
     * @return float
     */
    public static function get(string $name = 'global'): float
    {
        return (static::$timers[$name] + microtime(true));
    }

    /**
     * @param string $name
     * @param bool $inMillisecond
     * @return void
     */
    public static function display(string $name = 'global', bool $inMillisecond = true): void
    {
        $modifier = 1;
        $unit     = 's';

        if ($inMillisecond) {
            $modifier = 1000;
            $unit     = 'ms';
        }

        Logger::debug('Time[' . $name . ']: ' . round(static::get($name) * $modifier, 4) . $unit);
    }
}
