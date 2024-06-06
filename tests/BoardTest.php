<?php

use App\Board;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{
    private $board;

    public function setUp()
    {
        $this->board = new Board();
    }

    /** @dataProvider validPositionsDataProvider */
    public function testPositionIsValid($xAxis, $yAxis)
    {
        $this->assertTrue($this->board->isValidPosition($xAxis, $yAxis));
    }

    /** @dataProvider invalidPositionsDataProvider */
    public function testPositionIsInvalid($xAxis, $yAxis)
    {
        $this->assertFalse($this->board->isValidPosition($xAxis, $yAxis));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'valid position 1' => [0, 0],
            'valid position 2' => [7, 7],
            'valid position 3' => [3, 5],
        ];
    }

    public function invalidPositionsDataProvider(): array
    {
        return [
            'invalid position 1' => [-1, 0],
            'invalid position 2' => [0, -1],
            'invalid position 3' => [8, 0],
            'invalid position 4' => [0, 8]
        ];
    }
}