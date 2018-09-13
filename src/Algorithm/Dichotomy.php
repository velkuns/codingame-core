<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Algorithm;

/**
 * Class Dichotomy
 *
 * @author Romain Cottard
 */
final class Dichotomy
{
    /** @var string $termAbove */
    private $termAbove;

    /** @var string $termBeyond */
    private $termBeyond;

    /** @var int $maxValue */
    private $maxValue = null;

    /** @var int $minValue */
    private $minValue = null;

    /** @var int $currentValue */
    private $currentValue;

    /**
     * Dichotomy constructor.
     *
     * @param string $termAbove
     * @param string $termBeyond
     * @param int $boundMin
     * @param int $boundMax
     * @param int $initialValue
     */
    public function __construct($termAbove = 'up', $termBeyond = 'down', $boundMin = 0, $boundMax = 1000, $initialValue = 500)
    {
        $this->termAbove    = $termAbove;
        $this->termBeyond   = $termBeyond;
        $this->minValue     = $boundMin;
        $this->maxValue     = $boundMax;
        $this->currentValue = $initialValue;
    }

    /**
     * @param string $term
     * @return int
     */
    public function getPropositionBasedOnResponse($term)
    {
        if (empty($term)) {
            return $this->currentValue;
        }

        if ($term === $this->termAbove) {
            $this->minValue = $this->currentValue;
        } elseif ($term === $this->termBeyond) {
            $this->maxValue = $this->currentValue;
        }

        $newValue = (int) floor(($this->maxValue + $this->minValue) / 2);

        //~ Always keep a new value diff above 1
        $this->currentValue = $newValue === $this->currentValue ? $newValue + 1 : $newValue;

        return $this->currentValue;
    }
}
