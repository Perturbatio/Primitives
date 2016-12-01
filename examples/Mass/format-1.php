<?php
/**
 * Created by Kris with PhpStorm.
 * Date: 27/11/2016
 * Time: 17:38
 */
require_once('../../vendor/autoload.php');

use Perturbatio\Primitives\Mass;

$productWeight = Mass::createFromMetricTonnes(99999999999999);

echo $productWeight->format('{pounds:0} lbs and {remainderToOunces:2} oz<br>');
echo $productWeight->format('{micrograms:0} &micro;g<br>');
echo $productWeight->format('{milligrams:4} mg<br>');
echo $productWeight->format('{grams:0} g<br>');
echo $productWeight->format('{kilograms:4} kg<br>');
echo $productWeight->format('{metricTonnes:2} MT<br>');
echo $productWeight->format('{pounds:4} lbs<br>');
echo $productWeight->format('{stones:4} st<br>');
echo $productWeight->format('{troyPounds:4} Troy lbs<br>');
echo $productWeight->format('{troyOunces:4} Troy Oz<br>');
echo $productWeight->format('{ounces:4} oz<br>');
echo $productWeight->format('{imperialTons:4} T<br>');
echo $productWeight->format('{usTons:4} UST<br>');

echo "<strong>French decimals:</strong> ", $productWeight->format('{milligrams:2|,|.} mg<br>');
echo $productWeight->formatterKilogramsFloor(), '<br>';
echo $productWeight->formatterMetricTonnes(), ' MT<br>';
echo $productWeight->formatterPoundsRemainderToOunces(), '<br>';
echo $productWeight->formatterKilograms(), '<br>';
