<?php

namespace App;

use Exception;

abstract class Piece
{
    protected $xAxis;
    protected $yAxis;

    /**
     * @throws Exception
     */
    public function __construct(Board $board, int $xAxis, int $yAxis)
    {
        if (!$board->isValidPosition($xAxis, $yAxis)) {
            throw new Exception('Starting coordinates are invalid. Please ensure the piece starts inside the board.');
        }

        $this->xAxis = $xAxis;
        $this->yAxis = $yAxis;
    }

    /**
     * @throws Exception
     */
    protected function isValidEndingPosition(Board $board, int $newX, int $newY): void
    {
        if (!$board->isValidPosition($newX, $newY)) {
            throw new Exception('New coordinates are invalid. Please choose position inside the board.');
        }
    }
}