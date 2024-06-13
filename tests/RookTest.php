<?php

use App\Board;
use App\Rook;
use PHPUnit\Framework\TestCase;

class RookTest extends TestCase {

    private $board;
    private $rook;

    /**
     * @throws Exception
     */
    public function setUp()
    {
        $this->board = new Board();
        $this->rook = new Rook($this->board, 0, 0);
    }

    /**
     * @dataProvider validPositionsDataProvider
     * @throws Exception
     */
    public function testRookIsAllowedToMove(int $xAxis, int $yAxis): void
    {
        $this->assertTrue($this->rook->canMove($this->board, $xAxis, $yAxis));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testRookIsNotAllowedToMove(int $xAxis, int $yAxis): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        $this->rook->canMove($this->board, $xAxis, $yAxis);
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testRooksStartingPositionIsNotValid(int $xAxis, int $yAxis): void
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

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'invalid starting position 1' => [-1, 0],
            'invalid starting position 2' => [0, -1],
            'invalid starting position 3' => [8, 0],
            'invalid starting position 4' => [0, 8]
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'invalid ending position 1' => [1, 1]
        ];
    }
}