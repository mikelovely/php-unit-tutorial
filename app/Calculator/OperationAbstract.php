<?php

namespace App\Calculator;

class OperationAbstract
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}