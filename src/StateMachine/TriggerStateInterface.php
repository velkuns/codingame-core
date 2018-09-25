<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\StateMachine;

interface TriggerStateInterface
{
    /**
     * @return bool
     */
    public function isValid(): bool;

    /**
     * @return StateInterface
     */
    public function getNextState(): StateInterface;

    /**
     * @return TriggerInputsState
     */
    public function getInputs(): TriggerInputsState;
}
