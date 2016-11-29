<?php

class DivisionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function divides_given_operands()
    {
        $division = new \App\Calculator\Division;
        $division->setOperands([102.4, 2]);

        $this->assertEquals(51.2, $division->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $division = new \App\Calculator\Division;
        $division->calculate();
    }

    /** @test */
    public function removes_division_by_zero_operands()
    {
        $division = new \App\Calculator\Division;
        $division->setOperands([10, 0, 0, 5, 0]);
        
        $this->assertEquals(2, $division->calculate());
    }
}
