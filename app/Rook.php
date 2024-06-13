<?php

namespace App;

use Exception;

class Rook extends Piece
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

        return $this->xAxis == $newX || $this->yAxis == $newY;
    }
}