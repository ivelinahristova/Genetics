<?php

require_once('gene.php');
require_once('markGene.php');
require_once('EyesColor.php');
require_once('HairColor.php');
require_once('person.php');
require_once('population.php');
require_once('algorithm.php');

$fitValue = 2; //Solution fit - target is found
$stopOnLevel = 2; //Stop algorithm if target is not found in this generation level

$target = new Person();
$target->setEyesColor(new EyesColor(EyesColor::MARK_BLUE));
$target->setHairColor(new HairColor(HairColor::MARK_BLONDE));

$p1 = new Person();
$p1->setEyesColor(new EyesColor(EyesColor::MARK_BLUE));
$p1->setHairColor(new HairColor(HairColor::MARK_BROWN));

$p2 = new Person();
$p2->setEyesColor(new EyesColor(EyesColor::MARK_GREEN));
$p2->setHairColor(new HairColor(HairColor::MARK_BLONDE));

$p3 = new Person();
$p3->setEyesColor(new EyesColor(EyesColor::MARK_HAZEL));
$p3->setHairColor(new HairColor(HairColor::MARK_BLONDE));


$population = new Population();
$population->setPersons([$p1, $p2, $p3]);

$generationLevel = 1;

$solution = $population->getFittest($target);

while($solution->getFitness() != $fitValue && $generationLevel < $stopOnLevel) {
    $population = Algorithm::evolve($population, $target);
    $generationLevel++;
    $solution = $population->getFittest($target);
}

$solution = $population->getFittest($target);
?>
<h1>Population</h1>
<table>
    <tr>
        <th>Person</th>
        <th>Genes</th>
    </tr>
    <?php foreach($population->getPersons() as $person): ?>
    <?php /** @var $person Person */ var_dump($person)?>
        <tr>
            <td>name</td>
            <td>
                <ul>
                    <li>
                        <?php echo sprintf('Eyes Color: %s', $person->getEyesColor()->getMark()); ?>
                    </li>
                    <li>
                        <?php echo sprintf('Hair Color: %s', $person->getHairColor()->getMark()); ?>
                    </li>
            </ul>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h1>Target</h1>
    <li>
        <?php echo sprintf('Eyes Color: %s', $target->getEyesColor()->getMark()); ?>
    </li>
    <li>
        <?php echo sprintf('Hair Color: %s', $target->getHairColor()->getMark()); ?>
    </li>

<h1>Solution</h1>
    <li>
        <?php echo sprintf('Eyes Color: %s', $solution->getEyesColor()->getMark()); ?>
    </li>
    <li>
        <?php echo sprintf('Hair Color: %s', $solution->getHairColor()->getMark()); ?>
    </li>

<?php
var_dump($solution->getFitness($target));

var_dump($generationLevel);
?>