<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Collection;

use Velkuns\Codingame\Core\Algorithm\Permutation;

/**
 * Class AbstractCollection
 *
 * @author Romain Cottard
 */
abstract class Collection implements \Iterator, \Countable, \ArrayAccess
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
     * @return void
     */
    public function add($element, $index = null): void
    {
        $this->indices[$this->size] = $index ?? $this->size;
        $this->collection[$this->indices[$this->size]] = $element;
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        $this->size       = 0;
        $this->index      = 0;
        $this->indices    = [];
        $this->collection = [];
    }

    /**
     * @return string
     */
    public function getPermutationHash(): string
    {
        return implode('.', $this->indices);
    }

    /**
     * @param int $seed
     * @return $this
     */
    public function permute(int $seed): self
    {
        $this->indices = Permutation::permute($this->indices, $seed);

        return $this;
    }

    /**
     * @return array
     */
    public function getIndices(): array
    {
        return $this->indices;
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
        return $this->collection[$this->indices[$this->index]];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->indices[$this->index];
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

    /**
     * @param int $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->collection[$this->indices[$offset]]);
    }

    /**
     * @param  int $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (isset($this->collection[$this->indices[$offset]])) {
            return $this->collection[$this->indices[$offset]];
        }

        return null;
    }

    /**
     * @param  int|null $offset
     * @param  mixed $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if ($offset === null) {
            $this->add($value);
        } else {
            $this->collection[$this->indices[$offset]] = $value;
        }
    }

    /**
     * @param  int $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->collection[$this->indices[$offset]]);
    }

    /**
     * @return void
     */
    public function __clone()
    {
        foreach ($this->collection as $index => $element) {
            $this->collection[$index] = is_object($element) ? clone $element : $element;
        }
    }
}
