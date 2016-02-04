<?php

require_once('mark.php');
require_once('gene.php');
require_once('person.php');
require_once('population.php');

$genes = [];
$gene = new Gene();
$gene->setName('eyes');
$marks = [];
$mark = new Mark();
$mark->setName('blue');
$mark->getDominationRate(0);

array_push($marks, $mark);

$mark = new Mark();
$mark->setName('green');
$mark->getDominationRate(1);

array_push($marks, $mark);

$mark = new Mark();
$mark->setName('hazel');
$mark->getDominationRate(2);

array_push($marks, $mark);

$mark = new Mark();
$mark->setName('brown');
$mark->getDominationRate(3);

array_push($marks, $mark);

$gene->setMarks($marks);

array_push($genes, $gene);

$p1 = new Person([$gene->getName() => $marks[0]]);
$p2 = new Person([$gene->getName() => $marks[1]]);

$target = new Person([$gene->getName() => $marks[1]]);

$population = new Population();
$population->setPersons([$p1, $p2]);
$solution = $population->getFittest($target);
var_dump($marks[1]);
?>
<h1>Population</h1>
<table>
    <tr>
        <th>Person</th>
        <th>Genes</th>
    </tr>
    <?php foreach($population->getPersons() as $person): ?>
    <?php /** @var $person Person */?>
        <tr>
            <td>name</td>
            <td>
                <ul>
                    <?php foreach($person->getGenes() as $name=>$mark): ?>
                        <li>
                            <?php echo sprintf('%s: %s', $name, $mark->getName()); ?>
                        </li>
                    <?php endforeach; ?>

            </ul>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h1>Target</h1>
<?php foreach($target->getGenes() as $name=>$mark): ?>
    <li>
        <?php echo sprintf('%s: %s', $name, $mark->getName()); ?>
    </li>
<?php endforeach; ?>

<h1>Solution</h1>
<?php foreach($solution->getGenes() as $name=>$mark): ?>
    <li>
        <?php echo sprintf('%s: %s', $name, $mark->getName()); ?>
    </li>
<?php endforeach; ?>