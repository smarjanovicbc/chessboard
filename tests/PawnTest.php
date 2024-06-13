<?php

use App\Board;
use App\Pawn;
use PHPUnit\Framework\TestCase;

class PawnTest extends TestCase {

    private $board;
    private $pawn;

    /**
     * @throws Exception
     */
    public function setUp()
    {
        $this->board = new Board();
        $this->pawn = new Pawn($this->board, 0, 1);
    }

    /**
     * @dataProvider validPositionsDataProvider
     * @throws Exception
     */
    public function testPawnIsAllowedToMove(int $xAxis, int $yAxis, bool $isCapturing = false): void
    {
        $this->assertTrue($this->pawn->canMove($this->board, $xAxis, $yAxis, $isCapturing));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testPawnIsNotAllowedToMove(int $xAxis, int $yAxis): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        $this->pawn->canMove($this->board, $xAxis, $yAxis);
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testPawnsEndingPositionIsNotValid(int $xAxis, int $yAxis): void
    {
        $this->assertFalse($this->pawn->canMove($this->board, $xAxis, $yAxis));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'valid position 1' => [0, 2],
            'valid position 2' => [0, 3],
            'valid capture 1' => [1, 2, true]
        ];
    }

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'invalid starting position 1' => [-1, 1],
            'invalid starting position 2' => [0, -1],
            'invalid starting position 3' => [8, 1],
            'invalid starting position 4' => [0, 8]
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'invalid ending position 1' => [1, 1],
            'invalid ending position 2' => [0, 4],
            'invalid ending position 3' => [1, 3, true]
        ];
    }
}