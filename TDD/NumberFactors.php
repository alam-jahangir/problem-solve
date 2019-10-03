<?php

namespace TDD;

class NumberFactors
{

    /**
     * @var array
     */
    public $primeFactors = [];

    /**
     * @var int
     */
    protected $minPrimeFactor = 2;

    /**
     * NumberFactors constructor.
     */
    public function __construct()
    {
        $this->primeFactors = [];
    }

    /**
     * @param int|null $number
     * @return array
     */
    public function calcPrimeFactors($number = 0)
    {
        // Performance optimized version of vogella algorithms for primefactors
        $this->primeFactors = [];

        $number = (int)$number;
        if ($number <= 1) {
            return $this->primeFactors;
        }

        for (; $this->minPrimeFactor <= $number / $this->minPrimeFactor; $this->minPrimeFactor++) {
            while ($number % $this->minPrimeFactor == 0) {
                $this->primeFactors[] = $this->minPrimeFactor;
                $number /= $this->minPrimeFactor;
            }
        }

        if ($number > 1) {
            $this->primeFactors[] = $number;
        }

        return $this->primeFactors;
    }

}