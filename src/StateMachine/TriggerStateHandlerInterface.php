<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\StateMachine;

interface TriggerStateHandlerInterface
{
    /**
     * @param StateInterface $currentState
     * @param iterable $triggers
     * @return StateInterface
     */
    public function handle(StateInterface $currentState, iterable $triggers): StateInterface;
}
