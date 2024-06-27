<?php

namespace App;

use Exception;

class Pawn extends Piece
{
    private $isFirstMove;

    /**
     * @throws Exception
     */
    public function __construct(Board $board, Field $position)
    {
        parent::__construct($board, $position);
        $this->isFirstMove = true;
    }

    /**
     * @throws Exception
     */
    public function canMove(Board $board, Field $newPosition, bool $isCapturing = false): bool
    {
        $this->isValidEndingPosition($board, $newPosition);

        $dx = $newPosition->getXPosition() - $this->position->getXPosition();
        $dy = $newPosition->getYPosition() - $this->position->getYPosition();

        if ($isCapturing) {

            return abs($dx) == 1 && $dy == 1;
        } else {
            if ($this->isFirstMove && $dx == 0 && ($dy == 1 || $dy == 2)) {
                $this->isFirstMove = false;

                return true;
            }

            return $dx == 0 && $dy == 1;
        }
    }
}