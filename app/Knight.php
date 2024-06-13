<?php

namespace App;

use Exception;

class Knight extends Piece
{
    public function __construct(Board $board, int $xAxis, int $yAxis)
    {
        parent::__construct($board, $xAxis, $yAxis);
    }

    /**
     * @throws Exception
     */
    public function canMove(Board $board, int $newX, int $newY): bool
    {
        $this->isValidEndingPosition($board, $newX, $newY);

        $dx = abs($newX - $this->xAxis);
        $dy = abs($newY - $this->yAxis);

        return ($dx == 2 && $dy == 1) || ($dx == 1 && $dy == 2);
    }
}