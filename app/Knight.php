<?php

namespace App;

class Knight
{
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function canMove($board, $newX, $newY): bool
    {
        // Checking if new requested position is inside chessboard
        if (!$board->isValidPosition($newX, $newY)) {

            return false;
        }
        $dx = abs($newX - $this->x);
        $dy = abs($newY - $this->y);

        // Knight can move two fields in one and one field in other direction
        return ($dx == 2 && $dy == 1) || ($dx == 1 && $dy == 2);
    }
}