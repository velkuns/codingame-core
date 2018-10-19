<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\StateMachine;

use Velkuns\Codingame\Core\Logger\Logger;

final class TriggerStateHandler implements TriggerStateHandlerInterface
{
    /**
     * @inheritdoc
     */
    public function handle(StateInterface $currentState, iterable $triggers): StateInterface
    {
        $nextState = $currentState;
        foreach ($triggers as $trigger) {
            /** @var TriggerStateInterface $trigger */
            $isValidTrigger = $trigger->isValid();
            $this->debug($trigger, $isValidTrigger);
            if ($isValidTrigger) {
                $nextState = $currentState->handleTrigger($trigger->getNextState(), $trigger);
                break;
            }
        }

        //~ No transition apply if we haven't trigger valid.
        return $nextState;
    }

    /**
     * @param TriggerStateInterface $trigger
     * @param bool $isValidTrigger
     * @return void
     */
    private function debug(TriggerStateInterface $trigger, bool $isValidTrigger): void
    {
        $name = str_replace('Trigger', '', get_class($trigger));
        Logger::info($name . ': ' . var_export($isValidTrigger, true));
    }
}
