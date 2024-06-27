<?php

namespace App;

use Exception;

class Rook extends Piece
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

        return $this->position->getXPosition() == $newPosition->getXPosition() ||
               $this->position->getYPosition()  == $newPosition->getYPosition();
    }
}