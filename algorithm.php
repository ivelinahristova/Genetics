<?php

class Algorithm
{
    protected static $ELITISM = false;
    protected static $SIZE = 5;

    /**
     * @param $population Population
     * @param $target Person
     * @return Population
     */
    public static function evolve($population, $target)
    {
        $newPopulation = new Population();
        if(self::$ELITISM) {
            $newPopulation->addPerson($population->getFittest($target));
        }

        $pool = Algorithm::selection($population, $target);
//        var_dump('pool');
//        var_dump($pool);
        //Do crossover here
        for($i=0; $i<count($pool) - 1; $i++) {
            for($j=$i+1; $j<count($pool); $j++) {
                $child = Algorithm::crossover($pool[$i], $pool[$j]);
//                var_dump('CHILD');
//                var_dump($child);
                $newPopulation->addPerson($child);
            }
        }


        //Do mutations here

        return $newPopulation;
    }

    /**
     * @param $population Population
     * @param $target Person
     * @return array
     */
    public static function selection($population, $target)
    {
        $all = $population->getPersons();
        $sorted = usort($all, function($p1, $p2) use($target){
            /**
             * @var $p1 Person
             * @var $p2 Person
             */
            return $p1->calculateFitness($target) > $p2->calculateFitness($target);
        });

        return array_slice($all, 0, Algorithm::$SIZE);
    }

    /**
     * @param $person1 Person
     * @param $person2 Person
     * @return Person
     */
    public static function crossover($person1, $person2)
    {
        $child = new Person();
        $child->setEyesColor(Algorithm::getDominant($person1->getEyesColor(), $person2->getEyesColor()));
        $child->setHairColor(Algorithm::getDominant($person1->getHairColor(), $person2->getHairColor()));
        $child->setSkinColor(new SkinColor(floatval(($person1->getSkinColor()->getValue() + $person2->getSkinColor()->getValue()) / 2.0)));

        return $child;
    }

    /**
     * @param $gene1 MarkGene
     * @param $gene2 MarkGene
     * @return MarkGene
     */
    public static function getDominant($gene1, $gene2)
    {
        if($gene1->getDominationRate() > $gene2->getDominationRate()) {
            return $gene1;
        } else {
            return $gene2;
        }
    }
}