<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Utils;

/**
 * Class Number
 *
 * @author Romain Cottard
 */
final class Number
{
    /**
     * @param float $number
     * @param int $precision
     * @param string $padChar
     * @return string
     */
    public static function format(float $number, $precision = 4, $padChar = '0'): string
    {
        $number = round($number, $precision);

        if (strpos($number, '.') === false) {
            $number = (string) $number . '.0';
        }

        return str_pad($number, $precision + 2, $padChar);
    }
}
