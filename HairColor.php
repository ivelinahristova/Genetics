<?php

class HairColor extends MarkGene
{
    const MARK_BLONDE = 'blonde';
    const MARK_BROWN = 'brown';
    const MARK_BLACK = 'black';

    public function __construct($mark)
    {
        $this->setName('Hair Color');
        parent::__construct($mark);
    }

    public $marks = [
        self::MARK_BLONDE,
        self::MARK_BROWN,
        self::MARK_BLACK
    ];

    public $dominationRates = [
        self::MARK_BLONDE => 0,
        self::MARK_BROWN => 1,
        self::MARK_BLACK => 2
    ];
}