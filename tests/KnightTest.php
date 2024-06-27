<?php

use App\Board;
use App\Field;
use App\Knight;
use PHPUnit\Framework\TestCase;

class KnightTest extends TestCase {

    private $board;

    /**
     * @throws Exception
     */
    public function setUp()
    {
        $this->board = new Board();
    }

    /**
     * @dataProvider validPositionsDataProvider
     * @throws Exception
     */
    public function testKnightIsAllowedToMove(string $startingPosition, string $endingPosition): void
    {
        // given
        $knight = new Knight($this->board, new Field($startingPosition));

        // then
        $this->assertTrue($knight->canMove($this->board, new Field($endingPosition)));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testWhenTryingToCreateKnightInstanceWithInvalidPosition(string $position): void
    {
        // then
        $this->expectException(Exception::class);

        // when
         new Knight($this->board, new Field($position));
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testKnightsStartingPositionIsNotValid(string $startingPosition, string $endingPosition): void
    {
        // given
        $knight = new Knight($this->board, new Field($startingPosition));

        // then
        $this->assertFalse($knight->canMove($this->board, new Field($endingPosition)));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'Knight moves from B1 to C3' => ['B1', 'C3'],
            'Knight moves from G1 to E2' => ['G1', 'E2'],
            'Knight moves from D3 to C5' => ['D3', 'C5'],
            'Knight moves from B8 to A6' => ['B8', 'A6'],
            'Knight moves from G8 to E7' => ['G8', 'E7']

        ];
    }

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'Set Knight on I2' => ['I2'],
            'Set Knight on C9' => ['C9'],
            'Set Knight on A0' => ['A0'],
            'Set Knight on D-4' => ['D-4']
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'Knight moves from A1 to A1' => ['A1', 'A1'],
            'Knight moves from B1 to E4' => ['B1', 'E4'],
            'Knight moves from G1 to G3' => ['G1', 'G3']
        ];
    }
}