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

    /** @var array $stats */
    private static $stats  = [];

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
     * @return void
     */
    public static function save(string $name = 'global'): void
    {
        static::$stats[$name][] = (static::$timers[$name] + microtime(true));
    }

    /**
     * @param string $name
     * @param bool $inMillisecond
     * @return void
     */
    public static function displayStat(string $name = 'global', bool $inMillisecond = true): void
    {
        $nb  = count(static::$stats[$name]);
        $avg = array_sum(static::$stats[$name]) / max($nb, 1);

        $modifier = 1;
        $unit     = 's';

        if ($inMillisecond) {
            $modifier = 1000;
            $unit     = 'ms';
        }

        Logger::debug('Time Average[' . $name . '|' .  $nb . ' calls]: ' . round($avg * $modifier, 4) . $unit);
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
