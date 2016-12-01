<?php
/**
 * Created by Kris with PhpStorm.
 * Date: 27/11/2016
 * Time: 17:38
 */
require_once ('../../vendor/autoload.php');

use Perturbatio\Primitives\Mass;

$productWeight = Mass::createFromGrams(1600);
?>
<dl>
<?php
echo '<dt>Product weight in Kg: </dt><dd>', number_format($productWeight->toKilograms(), 2), "kg </dd>";

$weight_lbs = floor($productWeight->toPounds());
$remainder = Mass::createFromPounds($productWeight->toPounds() - $weight_lbs);
$weight_oz = $remainder->toOunces();

echo '<dt>Product weight in Lbs: </dt><dd>', number_format($weight_lbs, 0), "lbs ", number_format($weight_oz, 2), "oz </dd>";
?>
</dl>
