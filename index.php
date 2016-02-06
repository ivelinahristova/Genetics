<?php

require_once('mark.php');
require_once('gene.php');
require_once('person.php');
require_once('population.php');


$marks = [
    'blue' => 0,
    'green' => 1,
    'hazel' => 2,
    'brown' => 3
];

$genes = [];
$gene = new Gene($marks);
$gene->setName('eyes');

array_push($genes, $gene);

$p1 = new Person();
$p1->setGene($gene->getName(), $gene->getMark('blue'));
$p2 = new Person();
$p2->setGene($gene->getName(), $gene->getMark('green'));

$target = new Person();
$target->setGene($gene->getName(), $gene->getMark('green'));

$population = new Population();
$population->setPersons([$p1, $p2]);
$solution = $population->getFittest($target);
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