<html>
<head>
    <link href="styles/css/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/css/bootstrap-theme.css" rel="stylesheet"/>
    <link href="styles/css/style.css" rel="stylesheet"/>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="styles/js/bootstrap.min.js"></script>
</head>
<body>

<?php

require_once('gene.php');
require_once('markGene.php');
require_once('EyesColor.php');
require_once('HairColor.php');
require_once('valueGene.php');
require_once('SkinColor.php');
require_once('person.php');
require_once('population.php');
require_once('algorithm.php');

$timeStart = microtime(true);
$fitValue = 3; //Solution fit - target is found
$stopOnLevel = 4; //Stop algorithm if target is not found in this generation level

$target = new Person();
$target->setEyesColor(new EyesColor(EyesColor::MARK_BLUE));
$target->setHairColor(new HairColor(HairColor::MARK_BROWN));
$target->setSkinColor(new SkinColor(0.6));

$p1 = new Person();
$p1->setEyesColor(new EyesColor(EyesColor::MARK_BLUE));
$p1->setHairColor(new HairColor(HairColor::MARK_BROWN));
$p1->setSkinColor(new SkinColor(0.3));

$p2 = new Person();
$p2->setSkinColor(new SkinColor(0.6));

$p2->setEyesColor(new EyesColor(EyesColor::MARK_GREEN));
$p2->setHairColor(new HairColor(HairColor::MARK_BLONDE));

$p3 = new Person();
$p3->setEyesColor(new EyesColor(EyesColor::MARK_HAZEL));
$p3->setHairColor(new HairColor(HairColor::MARK_BLONDE));
$p3->setSkinColor(new SkinColor(0.9));

$population = new Population();
$population->setPersons([$p1, $p2, $p3]);

$generationLevel = 1;
$solution = $population->getFittest($target);
?>

<section>
    <h1>Initial Population</h1>
    <table>
        <tr>
            <th>Person</th>
            <th>Genes</th>
            <th>Fitness Value</th>
        </tr>
        <?php foreach($population->getPersons() as $person): ?>
            <?php /** @var $person Person */ ?>
            <tr>
                <td>name</td>
                <td>
                    <?php echo $person->htmlGenes(); ;
                    ?>
                </td>
                <td><?php echo $person->getFitness(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php
$population = Algorithm::evolve($population, $target);
$generationLevel++;
$solution = $population->getFittest($target);
?>

<?php while($solution->getFitness() != $fitValue && $generationLevel < $stopOnLevel):?>
    <section>
        <h1>Population <?php echo $generationLevel; ?></h1>
        <table>
            <tr>
                <th>Person</th>
                <th>Genes</th>
                <th>Fitness Value</th>
            </tr>
            <?php foreach($population->getPersons() as $person): ?>
                <?php /** @var $person Person */ ?>
                <tr>
                    <td>name</td>
                    <td>
                        <?php echo $person->htmlGenes(); ;
                        ?>
                    </td>
                    <td><?php echo $person->getFitness(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <?php
    $population = Algorithm::evolve($population, $target);
    $generationLevel++;
    $solution = $population->getFittest($target);
    ?>
<?php endwhile; ?>


<section class="target">
<div>
    <h2>Max Populations: <?php echo $stopOnLevel; ?></h2>
</div>
<h1>Target</h1>
<table>
    <tr>
        <th>Desirable Genes</th>
        <th>Desirable Fitness Value</th>
    </tr>
    <tr>
        <td>
            <?php echo $target->htmlGenes(); ?>
        </td>
        <td><?php echo $fitValue; ?></td>
    </tr>
</table>
</section>

<section>

<h1>Solution</h1>
<table>
    <tr>
        <th>Genes</th>
        <th>Fitness Value</th>
        <th>Generations Count</th>
        <th>Working Time</th>
    </tr>
    <tr>
        <td>
            <?php echo $solution->htmlGenes(); ?>
        </td>
        <td><?php echo $solution->getFitness(); ?></td>
        <td><?php echo $generationLevel; ?></td>
        <td><?php echo microtime(true) - $timeStart; ?></td>
    </tr>
</table>
</section>

</body>
</html>