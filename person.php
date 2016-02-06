<?php

/**
 * Class Person
 */
class Person
{
    protected $eyesColor;
    protected $hairColor;
    protected $fitness;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getFitness()
    {
        return $this->fitness;
    }

    /**
     * @param mixed $fitness
     */
    public function setFitness($fitness)
    {
        $this->fitness = $fitness;
    }

    /**
     * @return EyesColor
     */
    public function getEyesColor()
    {
        return $this->eyesColor;
    }

    /**
     * @param EyesColor $eyesColor
     */
    public function setEyesColor($eyesColor)
    {
        $this->eyesColor = $eyesColor;
    }

    /**
     * @return mixed
     */
    public function getHairColor()
    {
        return $this->hairColor;
    }

    /**
     * @param mixed $hairColor
     */
    public function setHairColor($hairColor)
    {
        $this->hairColor = $hairColor;
    }

    /**
     * The less the fitness rate is, the better
     * @param $target Person
     * @return int
     */
    public function calculateFitness($target)
    {
        $genesCount = 0;

        if($this->getEyesColor()->getMark() == $target->getEyesColor()->getMark()) {
            $genesCount++;
        }
        if($this->getHairColor()->getMark() == $target->getHairColor()->getMark()) {
            $genesCount++;
        }

        $this->setFitness($genesCount);
        return $genesCount;
    }

}
