<?php

namespace App;

use Exception;

class Knight extends Piece
{
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

        $dx = abs($newPosition->getXPosition() - $this->position->getXPosition());
        $dy = abs($newPosition->getYPosition() - $this->position->getYPosition());

        return ($dx == 2 && $dy == 1) || ($dx == 1 && $dy == 2);
    }
}