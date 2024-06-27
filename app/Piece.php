<?php

namespace App;

use Exception;

abstract class Piece
{
    protected $position;

    /**
     * @throws Exception
     */
    public function __construct(Board $board, Field $position)
    {
        if (!$board->isValidPosition($position->getXPosition(), $position->getYPosition())) {
            throw new Exception('Starting coordinates are invalid. Please ensure the piece starts inside the board.');
        }

        $this->position = $position;
    }

    /**
     * @throws Exception
     */
    protected function isValidEndingPosition(Board $board, Field $newPosition): void
    {
        if (!$board->isValidPosition($newPosition->getXPosition(), $newPosition->getYPosition())) {
            throw new Exception('New coordinates are invalid. Please choose position inside the board.');
        }
    }
}