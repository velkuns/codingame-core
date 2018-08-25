<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Math;

/**
 * Class Math
 *
 * @author Romain Cottard
 */
final class Math
{
    /**
     * @param int $n
     * @return int
     */
    public static function factorial(int $n): int
    {
        if ($n <= 0) {
            return 0;
        }

        $value = 1;
        for ($i = 2; $i <= $n; $i++) {
            $value *= $i;
        }

        return $value;
    }

    /**
     * @param int $n
     * @param array $count
     * @return int
     */
    public static function factorialMultiple(int $n, array $count): int
    {
        $factorial = static::factorial($n);

        $divider = 1;
        foreach ($count as $value) {
            $divider *= $value > 2 ? static::factorial($value) : $value;
        }

        return (int) ($factorial / $divider);
    }
}
