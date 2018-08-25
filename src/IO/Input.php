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
     * @param string $format
     * @return array
     */
    public static function read($format): array
    {
        return fscanf(STDIN, $format);
    }
}
