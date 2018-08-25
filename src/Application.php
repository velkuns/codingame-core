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
    private $game = null;

    /**
     * Application constructor.
     *
     * @param GameInterface $game
     */
    public function __construct(GameInterface $game)
    {
        $this->game = $game;
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
        }
    }
}
