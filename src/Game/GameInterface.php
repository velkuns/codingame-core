<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core\Game;

/**
 * Interface GameInterface
 *
 * @author Romain Cottard
 */
interface GameInterface
{
    /**
     * Initialize new turn.
     * Read input should be in this method.
     *
     * @return void
     */
    public function newTurn(): void;

    /**
     * Run the turn.
     * Main actions should be performed in this method.
     *
     * @return void
     */
    public function runTurn(): void;

    /**
     * End of turn.
     * Output should be write in this method.
     *
     * @return void
     */
    public function endTurn(): void;
}
