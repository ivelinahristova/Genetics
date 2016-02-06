<?php

/**
 * Class Gene
 */
class Gene
{
    protected $name;
    protected $marks;

    /**
     * @param $marks array
     */
    public function __construct($marks)
    {

        foreach($marks as $name => $dominationRate) {
            $mark = new Mark();
            $mark->setName($name);
            $mark->getDominationRate($dominationRate);
            $this->setMark($mark);
        }
    }

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
    public function getMarks()
    {
        return $this->marks;
    }

    /**
     * @param mixed $marks
     */
    public function setMarks($marks)
    {
        $this->marks = $marks;
    }

    /**
     * @param $mark Mark
     */
    public function setMark($mark)
    {
        $this->marks[$mark->getName()] = $mark;
    }

    public function getMark($name)
    {
        return $this->marks[$name];
    }
}