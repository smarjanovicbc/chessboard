<?php

use App\Board;
use App\Rook;
use PHPUnit\Framework\TestCase;

class RookTest extends TestCase {

    private $board;
    private $rook;

    public function setUp()
    {
        $this->board = new Board();
        $this->rook = new Rook(0, 0);
    }

    /** @dataProvider validPositionsDataProvider */
    public function testRookIsAllowedToMove($xAxis, $yAxis)
    {
        $this->assertTrue($this->rook->canMove($this->board, $xAxis, $yAxis));
    }

    /** @dataProvider invalidPositionsDataProvider */
    public function testRookIsNotAllowedToMove($xAxis, $yAxis)
    {
        $this->assertFalse($this->rook->canMove($this->board, $xAxis, $yAxis));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'valid position 1' => [0, 7],
            'valid position 2' => [7, 0]
        ];
    }

    public function invalidPositionsDataProvider(): array
    {
        return [
            'invalid position 1' => [1, 1],
            'invalid position 2' => [-1, 0],
            'invalid position 3' => [0, -1],
            'invalid position 4' => [8, 0],
            'invalid position 5' => [0, 8]
        ];
    }
}