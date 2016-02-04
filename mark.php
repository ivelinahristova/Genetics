<?php

/**
 * Class Mark
 */
class Mark
{
    protected $name;
    protected $dominationRate;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDominationRate()
    {
        return $this->dominationRate;
    }

    /**
     * @param mixed $dominationRate
     */
    public function setDominationRate($dominationRate)
    {
        $this->dominationRate = $dominationRate;
    }

}