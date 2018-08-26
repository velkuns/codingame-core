<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Velkuns\Codingame\Core;

use Velkuns\Codingame\Core\Game\GameInterface;
use Velkuns\Codingame\Core\Logger\Logger;

/**
 * Class Application
 *
 * @author Romain Cottard
 */
final class Application
{
    /** @var GameInterface $game */
    private $game;

    /** @var bool $hasLoop */
    private $hasLoop;

    /**
     * Application constructor.
     *
     * @param GameInterface $game
     * @param bool $hasLoop
     */
    public function __construct(GameInterface $game, $hasLoop = false)
    {
        $this->game    = $game;
        $this->hasLoop = $hasLoop;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        while (true) {

            try {

                $this->game->newTurn();
                $this->game->runTurn();
                $this->game->endTurn();

            } catch (\Exception $exception) {

                Logger::error($exception->getMessage());
                $this->game->endTurn();
            }

            //~ When no loop, break after first run.
            if (!$this->hasLoop) {
                break;
            }
        }
    }
}
