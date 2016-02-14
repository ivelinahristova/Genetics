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
    protected $parents;
    protected $id;
    protected $isMutant;

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIsMutant()
    {
        return $this->isMutant;
    }

    /**
     * @param mixed $isMutant
     */
    public function setIsMutant($isMutant)
    {
        $this->isMutant = $isMutant;
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
     * @return array
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param array $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
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

    public function htmlLooking()
    {
        $face = sprintf('<div class="face" style=" background-color: rgba(36,13,5, %s)">', $this->getSkinColor()->getValue());
//        $face .= '<img src="styles/images/nose.png" style="position: absolute; top: 37px; left: 39px; width: 13px; " />';
        $styleEyes = sprintf('position: absolute; top: %s; bottom: %s; left: %s; right: %s; width: 35px;',
            $this->getEyesColor()->getTop(), $this->getEyesColor()->getBottom(),
            $this->getEyesColor()->getLeft(), $this->getEyesColor()->getRight());
        $htmlEyes = sprintf('<img src="styles/images/%s" style="%s"/>', $this->getEyesColor()->getImage(), $styleEyes);

        $styleHair = sprintf('position: absolute; top: %s; bottom: %s; left: %s; right: %s; width: 80px;',
            $this->getHairColor()->getTop(), $this->getHairColor()->getBottom(),
            $this->getHairColor()->getLeft(), $this->getHairColor()->getRight());
        $htmlHair = sprintf('<img src="styles/images/%s" style="%s"/>', $this->getHairColor()->getImage(), $styleHair);

        $html = $face.$htmlHair.$htmlEyes.'</div>';

        return $html;
    }

}
