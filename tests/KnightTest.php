<?php

use App\Board;
use App\Knight;
use PHPUnit\Framework\TestCase;

class KnightTest extends TestCase {

    private $board;
    private $knight;

    public function setUp()
    {
        $this->board = new Board();
        $this->knight = new Knight(0, 0);
    }

    /** @dataProvider validPositionsDataProvider */
    public function testKnightIsAllowedToMove($xAxis, $yAxis)
    {
        $this->assertTrue($this->knight->canMove($this->board, $xAxis, $yAxis));
    }

    /** @dataProvider invalidPositionsDataProvider */
    public function testKnightIsNotAllowedToMove($xAxis, $yAxis)
    {
        $this->assertFalse($this->knight->canMove($this->board, $xAxis, $yAxis));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'valid position 1' => [2, 1],
            'valid position 2' => [1, 2]
        ];
    }

    public function invalidPositionsDataProvider(): array
    {
        return [
            'invalid position 1' => [2, 2],
            'invalid position 2' => [-1, -1],
            'invalid position 3' => [0, 0],
            'invalid position 4' => [8, 8]
        ];
    }
}