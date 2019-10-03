<?php
//require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\NumberFactors;

class NumberFactorsTest extends TestCase
{
    private $numberFactors;

    protected function setUp(): void
    {
        $this->numberFactors = new NumberFactors();
    }

    protected function tearDown(): void
    {
        $this->numberFactors = NULL;
    }

    public function addDataProvider()
    {
        return array(
            array(0, []),
            array(1, []),
            array(2, [2]),
            array(3, [3]),
            array(4, [2, 2]),
            array(9, [3, 3]),
            array(12, [2, 2, 3]),
            array(24, [2, 2, 2, 3]),
            array(100, [2, 2, 5, 5]),
            array(1000, [2, 2, 2, 5, 5, 5]),
        );
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testCalcPrimeFactors($input, $expected): void
    {

        $result = $this->numberFactors->calcPrimeFactors($input);
        $this->assertEquals($expected, $result);

    }
}