<?php

/**
 * Class Person
 */
class Person
{
    protected $eyesColor;
    protected $hairColor;
    protected $fitness;
    protected $skinColor; // Value [0.1, 1.0]

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
     * @return SkinColor
     */
    public function getSkinColor()
    {
        return $this->skinColor;
    }

    /**
     * @param mixed $skinColor
     */
    public function setSkinColor($skinColor)
    {
        $this->skinColor = $skinColor;

    }

    /**
     * The more the fitness rate is, the better
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

        $fitness = $genesCount + (1 - (abs($this->getSkinColor()->getValue() - $target->getSkinColor()->getValue())));

        $this->setFitness($fitness);
        return $fitness;
    }

    public function htmlGenes()
    {
        $html = '<ul>';
        $html .= '<li>'.$this->getEyesColor()->getName().' - '.$this->getEyesColor()->getMark().'</li>';
        $html .= '<li>'.$this->getHairColor()->getName().' - '.$this->getHairColor()->getMark().'</li>';
        $html .= '<li>'.$this->getSkinColor()->getName().' - '.$this->getSkinColor()->getValue().'</li>';
        $html .= '</ul>';

        return $html;
    }

}
