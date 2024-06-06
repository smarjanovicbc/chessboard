<?php

use App\Modulo;
use PHPUnit\Framework\TestCase;

class ModuloTest extends TestCase
{
    private $modulo;

    public function setUp()
    {
        $this->modulo = new Modulo();
    }

    /**
     * @dataProvider validValueDataProvider
     * @throws Exception
     */
    public function testIsModuloWithValidData($value, $res)
    {
        // when
        $result = $this->modulo->isModulo($value);

        // then
        $this->assertEquals($result, $res);
    }

    /**
     * @dataProvider invalidValueDataProvider
     * @throws Exception
     */
    public function testIsModuloWithInvalidData($value, $modBy)
    {
        // then
        $this->expectException(Exception::class);

        // when
        $this->modulo->isModulo($value, $modBy);
    }

    public function validValueDataProvider(): array
    {
        return [
            'even' => [2, true],
            'odd' => [1, false]
        ];
    }

    public function invalidValueDataProvider(): array
    {
        return [
            'value is a string' => ["Hakuna Matata", 2],
            'modBy is a string' => [2, "Hakuna Matata"]
        ];
    }
}