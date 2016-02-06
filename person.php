<?php

/**
 * Class Person
 */
class Person
{
    protected $genes = [];
    protected $fitness;

    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getGenes()
    {
        return $this->genes;
    }

    /**
     * @param array $genes
     */
    public function setGenes($genes)
    {
        $this->genes = $genes;
    }

    /**
     * @param $name
     * @param $mark
     */
    public function setGene($name, $mark)
    {
        $this->genes[$name] = $mark;
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
     * @param $geneName string
     * @return mixed
     */
    public function getMark($geneName)
    {
        return $this->genes[$geneName];
    }

    /**
     * The less the fitness rate is, the better
     * @param $target Person
     * @return int
     */
    public function calculateFitness($target)
    {
        $genesCount = count($this->genes);

        foreach($this->genes as $name=>$mark) {
            if($mark == $target->getMark($name)) {
                $genesCount--;
            }
        }

        return $genesCount;
    }

}
