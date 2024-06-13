<?php

use App\Board;
use App\Knight;
use PHPUnit\Framework\TestCase;

class KnightTest extends TestCase {

    private $board;
    private $knight;

    /**
     * @throws Exception
     */
    public function setUp()
    {
        $this->board = new Board();
        $this->knight = new Knight($this->board, 0, 0);
    }

    /**
     * @dataProvider validPositionsDataProvider
     * @throws Exception
     */
    public function testKnightIsAllowedToMove(int $xAxis, int $yAxis): void
    {
        $this->assertTrue($this->knight->canMove($this->board, $xAxis, $yAxis));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testKnightIsNotAllowedToMove(int $xAxis, int $yAxis): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        $this->knight->canMove($this->board, $xAxis, $yAxis);
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testKnightsStartingPositionIsNotValid(int $xAxis, int $yAxis): void
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

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'invalid starting position 1' => [-1, -1],
            'invalid starting position 3' => [8, 8]
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'invalid ending position 1' => [0, 0],
            'invalid ending position 2' => [2, 2]
        ];
    }
}