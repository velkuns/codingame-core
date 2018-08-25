<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\IO;

/**
 * Class Output
 *
 * @author Romain Cottard
 */
final class Output
{
    /**
     * @param string $string
     * @return void
     */
    public static function write(string $string): void
    {
        echo $string . "\n";
    }
}
