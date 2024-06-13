<?php

namespace App;

use Exception;

class Pawn extends Piece
{
    private $isFirstMove;

    /**
     * @throws Exception
     */
    public function __construct(Board $board, int $xAxis, int $yAxis)
    {
        parent::__construct($board, $xAxis, $yAxis);
        $this->isFirstMove = true;
    }

    /**
     * @throws Exception
     */
    public function canMove(Board $board, int $newX, int $newY, bool $isCapturing = false): bool
    {
        $this->isValidEndingPosition($board, $newX, $newY);

        $dx = $newX - $this->xAxis;
        $dy = $newY - $this->yAxis;

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