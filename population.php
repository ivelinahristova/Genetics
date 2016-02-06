<?php

require_once('person.php');

class Population
{
    protected $persons;

    /**
     * @return array Person
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @param mixed $persons
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;
    }

    /**
     * @param $target Person
     * @return Person
     */
    public function getFittest($target)
    {
        $first = $this->getPersons()[0];
        /** @var $first Person */
        $fittedPerson = $first;
        foreach($this->getPersons() as $person) {
            /** @var $person Person */

            if($fittedPerson->calculateFitness($target) < $person->calculateFitness($target)) {
                $fittedPerson = $person;
            }
        }

        return $fittedPerson;
    }

    /**
     * @param $person
     */
    public function addPerson($person)
    {
        if($this->persons) {
            array_push($this->persons, $person);

        } else {
            $this->persons = [$person];
        }
    }

    /**
     * @param $persons
     */
    public function addPersons($persons)
    {
        $this->setPersons(array_merge($this->persons, $persons));
    }
}