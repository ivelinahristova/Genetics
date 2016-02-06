<?php

/**
 * Class MarkGene
 */
class MarkGene extends Gene
{
    protected $mark;
    public $marks = [
    ];

    public $dominationRates = [
    ];

    public function __construct($mark)
    {
        $this->setMark($mark);
    }

    /**
     * @return mixed
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param mixed $mark
     */
    public function setMark($mark)
    {
        $this->mark = $mark;
    }

    public function getDominationRate()
    {
        $mark = $this->getMark();
        return $this->dominationRates[$mark];
    }
}