<?php

use App\Board;
use App\Bishop;
use App\Field;
use PHPUnit\Framework\TestCase;

class BishopTest extends TestCase
{
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
    public function testBishopIsAllowedToMove(string $startingPosition, string $endingPosition): void
    {
        $bishop = new Bishop($this->board, new Field($startingPosition));

        $this->assertTrue($bishop->canMove($this->board, new Field($endingPosition)));
    }

    /**
     * @dataProvider invalidStartingPositionsDataProvider
     * @throws Exception
     */
    public function testWhenTryingToCreateBishopInstanceWithInvalidPosition(string $position): void
    {
        // then
        $this->expectException(Exception::class);

        // when
        new Bishop($this->board, new Field($position));
    }

    /**
     * @dataProvider invalidEndingPositionsDataProvider
     * @throws Exception
     */
    public function testBishopsStartingPositionIsNotValid(string $startingPosition, string $endingPosition): void
    {
        $bishop = new Bishop($this->board, new Field($startingPosition));

        $this->assertFalse($bishop->canMove($this->board, new Field($endingPosition)));
    }

    public function validPositionsDataProvider(): array
    {
        return [
            'Bishop moves from C1 to B2' => ['C1', 'B2'],
            'Bishop moves from F1 to A6' => ['F1', 'A6'],
            'Bishop moves from C8 to A6' => ['C8', 'A6'],
            'Bishop moves from F8 to A3' => ['F8', 'A3'],
            'Bishop moves from C5 to F2' => ['C5', 'F2']
        ];
    }

    public function invalidStartingPositionsDataProvider(): array
    {
        return [
            'Set Bishop on A9' => ['A9'],
            'Set Bishop on I1' => ['I1'],
            'Set Bishop on A0' => ['A0'],
            'Set Bishop on H-1' => ['H-1']
        ];
    }

    public function invalidEndingPositionsDataProvider(): array
    {
        return [
            'Bishop moves from A1 to B1' => ['C1', 'C3'],
            'Bishop moves from A1 to A2' => ['F1', 'H1'],
            'Bishop moves from A1 to H1' => ['C8', 'B5'],
            'Bishop moves from A1 to A5' => ['F8', 'D7'],
            'Bishop moves from E4 to C3' => ['E4', 'C3']
        ];
    }
}