<?php

/**
 * Class ValueGene
 */
class ValueGene extends Gene
{
    protected $value;


    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}