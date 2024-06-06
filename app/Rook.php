<?php

namespace App;

class Rook
{
    private $xAxis;
    private $yAxis;

    public function __construct($xAxis, $yAxis) {
        $this->xAxis = $xAxis;
        $this->yAxis = $yAxis;
    }

    public function canMove($board, $newX, $newY) {
        // Checking if new requested position is inside chessboard
        if (!$board->isValidPosition($newX, $newY)) {

            return false;
        }

        // Rook can move either on x or y-axis so one of them must be the same
        return $this->xAxis == $newX || $this->yAxis == $newY;
    }
}