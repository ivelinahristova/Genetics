<?php

class EyesColor extends MarkGene
{
    const MARK_BLUE = 'blue';
    const MARK_GREEN = 'green';
    const MARK_HAZEL = 'hazel';
    const MARK_BROWN = 'brown';

    public function __construct($mark)
    {
        $this->setName('Eyes Color');
        parent::__construct($mark);
    }

    public $marks = [
        self::MARK_BLUE,
        self::MARK_GREEN,
        self::MARK_HAZEL,
        self::MARK_BROWN
    ];

    public $dominationRates = [
        self::MARK_BLUE => 0,
        self::MARK_GREEN => 1,
        self::MARK_HAZEL => 2,
        self::MARK_BROWN => 3
    ];
}