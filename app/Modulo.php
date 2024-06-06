<?php

namespace App;

use Exception;

class Modulo
{
    /**
     * @throws Exception
     */
    public function isModulo($value, $modBy = 2): bool
    {
        if (!is_numeric($value) || !is_numeric($modBy)) {
            throw new \Exception('Parameters type must be numeric.');
        }

        return $value % $modBy === 0;
    }
}