<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\IO;

/**
 * Class Input
 *
 * @author Romain Cottard
 */
final class Input
{
    /**
     * @param int $length
     * @param string $lineEnd
     * @return string
     */
    public static function readLine(int $length = 1025, $lineEnd = "\n"): string
    {
        return trim(stream_get_line(STDIN, $length, $lineEnd));
    }

    /**
     * @param string $format
     * @return array
     */
    public static function read($format): array
    {
        return fscanf(STDIN, $format);
    }
}
