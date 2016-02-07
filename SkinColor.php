<?php

class SkinColor extends ValueGene
{
    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->setName('Skin Color');
        parent::__construct($value);
    }
}