<?php

use App\Board;
use App\Field;
use App\Pawn;
use PHPUnit\Framework\TestCase;

class PawnTest extends TestCase {

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
    public function testPawnIsAllowedToMove(string $startingPosition, string $endingPosition, bool $isCapturing = false): void
    {
        $pawn = new Pawn($this->board, new Field($startingPosition));

        $this->assertTrue($pawn->canMove($this->board, new Field($endingPosition), $isCapturing));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testWhenTryingToCreatePawnInstanceWithInvalidPosition(string $position): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        new Pawn($this->board, new Field($position));
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testPawnsEndingPositionIsNotValid(string $startingPosition, string $endingPosition, bool $isCapturing = false): void
    {
        $pawn = new Pawn($this->board, new Field($startingPosition));

        $this->assertFalse($pawn->canMove($this->board, new Field($endingPosition), $isCapturing));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'Pawn moves from B2 to B3' => ['B2', 'B3'],
            'Pawn moves from D2 to D4' => ['D2', 'D4'],
            'Pawn moves from C2 to D3' => ['C2', 'D3', true],
            'Pawn moves from E4 to F5' => ['E4', 'F5', true]
        ];
    }

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'Set Pawn on B9' => ['B9'],
            'Set Pawn on I1' => ['I1'],
            'Set Pawn on A0' => ['A0'],
            'Set Pawn on A-2' => ['A-2']
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'Pawn moves from B2 to A2' => ['B2', 'A2'],
            'Pawn moves from B2 to C2' => ['B2', 'C2'],
            'Pawn moves from C2 to D4' => ['C2', 'D4', true],
            'Pawn moves from H2 to G2' => ['H2', 'G2'],
            'Pawn moves from B2 to C1' => ['B2', 'C1']
        ];
    }
}