<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\StateMachine;

class TriggerInputsState
{
    /** @var array $inputs */
    private $inputs = [];

    /**
     * @param string $name
     * @param $value
     * @return TriggerInputsState
     */
    public function add(string $name, $value): self
    {
        $this->inputs[$name] = $value;

        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        return $this->inputs[$name];
    }
}
