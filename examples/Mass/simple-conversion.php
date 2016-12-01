<?php
/**
 * Created by Kris with PhpStorm.
 * Date: 27/11/2016
 * Time: 17:38
 */
require_once ('../../vendor/autoload.php');

use Perturbatio\Primitives\Mass;

$productWeight = Mass::createFromGrams(1600);

echo 'Product weight kg: ', number_format($productWeight->toKilograms(), 2), "kg<br>";
echo 'Product weight lbs: ', number_format($productWeight->toPounds(), 2), "lbs<br>";
