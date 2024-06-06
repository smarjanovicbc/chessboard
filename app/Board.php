<?php

namespace App;

class Board
{
    public function isValidPosition($x, $y): bool
    {
        return $x >= 0 && $x < 8 && $y >= 0 && $y < 8;
    }
}