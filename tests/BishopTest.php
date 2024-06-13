<?php

use App\Board;
use App\Bishop;
use PHPUnit\Framework\TestCase;

class BishopTest extends TestCase
{
    private $board;
    private $bishop;

    /**
     * @throws Exception
     */
    public function setUp()
    {
        $this->board = new Board();
        $this->bishop = new Bishop($this->board, 0, 0);
    }

    /**
     * @dataProvider validPositionsDataProvider
     * @throws Exception
     */
    public function testBishopIsAllowedToMove(int $xAxis, int $yAxis): void
    {
        $this->assertTrue($this->bishop->canMove($this->board, $xAxis, $yAxis));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testBishopIsNotAllowedToMove(int $xAxis, int $yAxis): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        $this->bishop->canMove($this->board, $xAxis, $yAxis);
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testBishopsStartingPositionIsNotValid(int $xAxis, int $yAxis): void
    {
        $this->assertFalse($this->bishop->canMove($this->board, $xAxis, $yAxis));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'valid position 1' => [2, 2],
            'valid position 2' => [7, 7]
        ];
    }

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'invalid starting position 1' => [-1, 2],
            'invalid starting position 2' => [-4, -4],
            'invalid starting position 3' => [0, 8]
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'invalid ending position 1' => [1, 2],
            'invalid ending position 2' => [4, 3],
            'invalid ending position 3' => [0, 7]
        ];
    }
}