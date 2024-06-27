<?php

use App\Board;
use App\Field;
use App\Rook;
use PHPUnit\Framework\TestCase;

class RookTest extends TestCase {

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
    public function testRookIsAllowedToMove(string $startingPosition, string $endingPosition): void
    {
        // given
        $rook = new Rook($this->board, new Field($startingPosition));

        // then
        $this->assertTrue($rook->canMove($this->board, new Field($endingPosition)));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testWhenTryingToCreateRookInstanceWithInvalidPosition(string $position): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        new Rook($this->board, new Field($position));
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testRooksStartingPositionIsNotValid(string $startingPosition, string $endingPosition): void
    {
        // given
        $rook = new Rook($this->board, new Field($startingPosition));

        // then
        $this->assertFalse($rook->canMove($this->board, new Field($endingPosition)));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'Rook moves from A1 to A8' => ['A1', 'A8'],
            'Rook moves from C1 to C2' => ['C1', 'C2'],
            'Rook moves from D1 to D5' => ['D1', 'D5'],
            'Rook moves from F5 to F2' => ['F5', 'F2'],
            'Rook moves from B1 to E1' => ['B1', 'E1'],
            'Rook moves from H1 to A1' => ['H1', 'A1']
        ];
    }

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'Set Rook on A9' => ['A9'],
            'Set Rook on I5' => ['I5'],
            'Set Rook on B0' => ['B0'],
            'Set Rook on C-1' => ['C-1']
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'Rook moves from A1 to B2' => ['A1', 'B2'],
            'Rook moves from F7 to H8' => ['F7', 'H8'],
            'Rook moves from A1 to D4' => ['A1', 'D4']
        ];
    }
}