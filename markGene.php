<?php

/**
 * Class MarkGene
 */
class MarkGene extends Gene
{
    protected $mark;
    public $marks = [
    ];
    public $images = [];

    protected $image;
    protected $top;
    protected $left;
    protected $bottom;
    protected $right;

    public $dominationRates = [
    ];

    public function __construct($mark)
    {
        $this->setMark($mark);
    }

    /**
     * @return mixed
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param mixed $mark
     */
    public function setMark($mark)
    {
        $this->mark = $mark;
    }

    public function getDominationRate()
    {
        $mark = $this->getMark();
        return $this->dominationRates[$mark];
    }

    /**
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param mixed $right
     */
    public function setRight($right)
    {
        $this->right = $right;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->images[$this->getMark()];
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param mixed $top
     */
    public function setTop($top)
    {
        $this->top = $top;
    }

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param mixed $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @return mixed
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * @param mixed $bottom
     */
    public function setBottom($bottom)
    {
        $this->bottom = $bottom;
    }
}