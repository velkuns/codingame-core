<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Collection;

/**
 * Class AbstractCollection
 *
 * @author Romain Cottard
 */
abstract class AbstractCollection implements CollectionInterface
{
    /** @var array $collection  */
    protected $collection = [];

    /** @var array $indices  */
    protected $indices = [];

    /** @var int $index */
    protected $index = 0;

    /** @var int $size */
    protected $size = 0;

    /**
     * @param mixed $element
     * @param string|int|null $index
     * @return CollectionInterface
     */
    public function add($element, $index = null): CollectionInterface
    {
        $this->indices[$this->size] = $index ?? $this->size;
        $this->collection[$this->indices[$this->size]] = $element;

        return $this;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->index = 0;
    }

    /**
     * @return void
     */
    public function next()
    {
        $this->index++;
    }

    /**
     * @return object
     */
    public function current()
    {
        return $this->collection[$this->index];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->index;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return ($this->index < $this->size);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->size;
    }
}
