<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\StateMachine;

interface TransitionStateInterface
{
    /**
     * @param StateInterface $currentState
     * @param StateInterface $nextState
     * @param TriggerStateInterface $trigger
     * @param TriggerInputsState $inputs
     * @return StateInterface
     */
    public function apply(
        StateInterface $currentState,
        StateInterface $nextState,
        TriggerStateInterface $trigger,
        TriggerInputsState $inputs
    ): StateInterface;
}
