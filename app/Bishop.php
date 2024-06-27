<?php

namespace App;

use Exception;

class Bishop extends Piece
{
    /**
     * @throws Exception
     */
    public function __construct(Board $board, Field $position)
    {
        parent::__construct($board, $position);
    }

    /**
     * @throws Exception
     */
    public function canMove(Board $board, Field $newPosition): bool
    {
        $this->isValidEndingPosition($board, $newPosition);

        return abs($this->position->getXPosition() - $newPosition->getXPosition()) ==
               abs($this->position->getYPosition() - $newPosition->getYPosition());
    }
}