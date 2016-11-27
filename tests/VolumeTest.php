<?php
namespace Perturbatio\Primitives\Tests;

use Perturbatio\Primitives\Volume;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

class VolumeTest extends \Orchestra\Testbench\TestCase {
	//------------------[ Test unit to unit conversion ]------------------//
	public function testCreateFromMillilitres() {
		$value = 1;
		$volume = Volume::createFromMillilitres($value);
		$expected = 1;
		$result = $volume->toMillilitres();
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to Millilitres, expected {$expected}, but got {$result}");
	}

	public function testCreateFromLitres() {
		$value = 1;
		$volume = Volume::createFromLitres($value);
		$expected = 1;
		$result = $volume->toLitres();
		$this->assertEquals($expected, $result, "Error converting from {$value} From Litres to Litres, expected {$expected}, but got {$result}");
	}

	public function testCreateFromImperialOunces() {
		$value = 1;
		$volume = Volume::createFromImperialOunces($value);
		$expected = 1;
		$result = $volume->toImperialOunces();
		$this->assertEquals($expected, $result, "Error converting from {$value} Imperial Ounces to Imperial Ounces, expected {$expected}, but got {$result}");
	}

	public function testCreateFromUSOunces() {
		$value = 1;
		$volume = Volume::createFromUSOunces($value);
		$expected = 1;
		$result = $volume->toUSOunces();
		$this->assertEquals($expected, $result, "Error converting from {$value} US Ounces to US Ounces, expected {$expected}, but got {$result}");
	}

	public function testCreateFromImperialGallons() {
		$value = 1;
		$volume = Volume::createFromImperialGallons($value);
		$expected = 1;
		$result = $volume->toImperialGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} Imperial Gallons to Imperial Gallons, expected {$expected}, but got {$result}");
	}

	public function testCreateFromUSLiquidGallons() {
		$value = 1;
		$volume = Volume::createFromUSLiquidGallons($value);
		$expected = 1;
		$result = $volume->toUSLiquidGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} US Liquid Gallons to US Liquid Gallons, expected {$expected}, but got {$result}");
	}

	public function testCreateFromUSDryGallons() {
		$value = 1;
		$volume = Volume::createFromUSDryGallons($value);
		$expected = 1;
		$result = $volume->toUSDryGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} US Dry Gallons to US Dry Gallons, expected {$expected}, but got {$result}");
	}
	//------------------[ convert 1 millilitre to other units ]------------------//

	public function testConvertToMillilitres() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = 1;
		$result   = $volume->toMillilitres();
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to Millilitres, expected {$expected}, but got {$result}");
	}

	public function testConvertToLitres() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = 0.001;
		$result   = $volume->toLitres();
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to Litres, expected {$expected}, but got {$result}");
	}

	public function testConvertToImperialOunces() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = number_format(0.035195, 6);
		$result   = number_format($volume->toImperialOunces(), 6);
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to Imperial Ounces, expected {$expected}, but got {$result}");
	}

	public function testConvertToUSOunces() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = number_format(0.033814, 6);
		$result   = number_format($volume->toUSOunces(), 6);
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to US Ounces, expected {$expected}, but got {$result}");
	}

	public function testConvertToImperialGallons() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = number_format(0.0002199692482991, 6);
		$result   = number_format($volume->toImperialGallons(), 6);
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to Imperial Gallons, expected {$expected}, but got {$result}");
	}

	public function testConvertToUSLiquidGallons() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = 0.00026417;
		$result   = $volume->toUSLiquidGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to US Liquid Gallons, expected {$expected}, but got {$result}");
	}

	public function testConvertToUSDryGallons() {
		$value    = 1;
		$volume   = Volume::createFromMillilitres($value);
		$expected = 0.00022702;
		$result   = $volume->toUSDryGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} Millilitres to US Dry Gallons, expected {$expected}, but got {$result}");
	}
	//------------------[ convert 1 litre to other units ]------------------//

	public function testConvertOneLitreToMillilitres() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = 1000;
		$result   = $volume->toMillilitres();
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to Millilitres, expected {$expected}, but got {$result}");
	}

	public function testConvertOneLitreToLitres() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = 1;
		$result   = $volume->toLitres();
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to Litres, expected {$expected}, but got {$result}");
	}

	public function testConvertOneLitreToImperialOunces() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = number_format(35.195080, 6);
		$result   = number_format($volume->toImperialOunces(), 6);
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to Imperial Ounces, expected {$expected}, but got {$result}");
	}

	public function testConvertOneLitreToUSOunces() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = number_format(0.033814, 6);
		$result   = number_format($volume->toUSOunces(), 6);
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to US Ounces, expected {$expected}, but got {$result}");
	}

	public function testConvertOneLitreToImperialGallons() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = 0.0002199692482991;
		$result   = $volume->toImperialGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to Imperial Gallons, expected {$expected}, but got {$result}");
	}

	public function testConvertOneLitreToUSLiquidGallons() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = 0.00026417;
		$result   = $volume->toUSLiquidGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to US Liquid Gallons, expected {$expected}, but got {$result}");
	}

	public function testConvertOneLitreToUSDryGallons() {
		$value    = 1;
		$volume   = Volume::createFromLitres($value);
		$expected = 0.00022702;
		$result   = $volume->toUSDryGallons();
		$this->assertEquals($expected, $result, "Error converting from {$value} Litres to US Dry Gallons, expected {$expected}, but got {$result}");
	}

}

/*
	$volume = Volume::createFromMillilitres(1000);
	$volume = Volume::createFromLitres(1);
	$volume = Volume::createFromImperialOunces(35.195);
	$volume = Volume::createFromUSOunces(33.814);
	$volume = Volume::createFromImperialGallons(0.21997);
	$volume = Volume::createFromUSLiquidGallons(0.26417);
	$volume = Volume::createFromUSDryGallons(0.22702);
	echo '<pre>';
	echo '     Millilitres: ', $volume->toMillilitres(), '<br>';
	echo '          Litres: ', $volume->toLitres(), '<br>';
	echo '       Imperial Ounces: ', $volume->toImperialOunces(), '<br>';
	echo '      Imperial Gallons: ', $volume->toImperialGallons(), '<br>',
	'<br>';
	echo '       US Ounces: ', $volume->toUSOunces(), '<br>';
	echo '   US Dry Gallons: ', $volume->toUSDryGallons(), '<br>';
	echo 'US Liquid Gallons: ', $volume->toUSLiquidGallons(), '<br>'; */
