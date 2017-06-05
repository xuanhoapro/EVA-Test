<?php

class Division
{
    /**
     * @var mixed
     */
    protected $number;

    public function __construct($number = null)
    {
        if ($number) {
            $this->setNumber($number);
        }
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * get remainder of division
     *
     * @param int $divisor
     * @return int
     * @throws Exception
     */
    public function remainder($divisor)
    {
        if ($divisor == 0) {
            throw new Exception('Division by zero.');
        }
        return $this->number % $divisor;
    }
}
