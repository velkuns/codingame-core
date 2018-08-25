<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Collection;

/**
 * Interface CollectionInterface
 *
 * @author Romain Cottard
 */
interface CollectionInterface extends \Iterator, \Countable
{
    /**
     * @param mixed $element
     * @param string|int|null $index
     * @return CollectionInterface
     */
    public function add($element, $index = null): CollectionInterface;
}
