<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\StateMachine;

interface StateInterface
{
    /**
     * @return string
     */
    public function get(): string;

    /**
     * @param TriggerInputsState $inputs
     * @return TriggerStateInterface[]
     */
    public function getTriggers(TriggerInputsState $inputs): array;

    /**
     * @param StateInterface $currentState
     * @param StateInterface $nextState
     * @param TriggerStateInterface $trigger
     * @return void
     */
    public function transitionTo(StateInterface $currentState, StateInterface $nextState, TriggerStateInterface $trigger): void;
}
