<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Logger;

/**
 * Class Logger
 *
 * @author Romain Cottard
 */
final class Logger
{
    /**
     * @param string $string
     * @param mixed $context
     * @return void
     */
    public static function debug(string $string, $context = null): void
    {
        static::write(__FUNCTION__, $string, $context);
    }

    /**
     * @param string $string
     * @param mixed $context
     * @return void
     */
    public static function info(string $string, $context = null): void
    {
        static::write(__FUNCTION__, $string, $context);
    }

    /**
     * @param string $string
     * @param mixed $context
     * @return void
     */
    public static function error(string $string, $context = null): void
    {
        static::write(__FUNCTION__, $string, $context);
    }

    /**
     * @param string $string
     * @return void
     */
    public static function log(string $string): void
    {
        error_log($string);
    }

    /**
     * @param $type
     * @param string $string
     * @param mixed $context
     * @return void
     */
    private static function write(string $type, string $string, $context = null): void
    {
        $log = '[' . strtoupper($type) . '] '. $string;

        if (!empty($context)) {
            $log .= "\nContext: " . var_export($context, true) . "\n";
        }

        error_log($log);
    }
}
