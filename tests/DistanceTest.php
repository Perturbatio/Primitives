<?php
namespace Perturbatio\Primitives\Tests;

use Perturbatio\Primitives\Distance;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

class DistanceTest extends \Orchestra\Testbench\TestCase {
	//------------------[ Test unit to unit conversion ]------------------//

	public function testThatOneNanometreEqualsOneNanometre() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromNanometres($value);
		$this->assertEquals($expected, $distance->toNanometres(), "$value Nanometres cannot be converted to $expected Nanometres");
	}

	public function testThatOneMicrometreEqualsOneMicrometre() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromMicrometres($value);
		$this->assertEquals($expected, $distance->toMicrometres(), "$value Micrometres cannot be converted to $expected Micrometres");
	}

	public function testThatOneMillimetreEqualsOneMillimetre() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromMillimetres($value);
		$this->assertEquals($expected, $distance->toMillimetres(), "$value Millimetres cannot be converted to $expected Millimetres");
	}

	public function testThatOneMetreEqualsOneMetre() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromMetres($value);
		$this->assertEquals($expected, $distance->toMetres(), "$value Metres cannot be converted to $expected Metres");
	}

	public function testThatOneKiloMetreEqualsOneKiloMetre() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromKilometres($value);
		$this->assertEquals($expected, $distance->toKilometres(), "$value KiloMetres cannot be converted to $expected Kilometres");
	}

	public function testThatOneInchEqualsOneInch() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromInches($value);
		$this->assertEquals($expected, $distance->toInches(), "$value Inches cannot be converted to $expected Inches");
	}

	public function testThatOneFootEqualsOneFoot() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromFeet($value);
		$this->assertEquals($expected, $distance->toFeet(), "$value Feet cannot be converted to $expected Feet");
	}

	public function testThatOneYardEqualsOneYard() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromYards($value);
		$this->assertEquals($expected, $distance->toYards(), "$value Yards cannot be converted to $expected Yards");
	}

	public function testThatOneMileEqualsOneMile() {
		$value = 1;
		$expected = 1;
		$distance = Distance::createFromMiles($value);
		$this->assertEquals($expected, $distance->toMiles(), "$value Miles cannot be converted to $expected Miles");
	}

	//------------------[ convert between units ]------------------//

	public function testThatOneMetreEqualsOneThousandMillimetres() {
		$value    = 1;
		$distance = Distance::createFromMetres($value);
		$expected = 1000;
		$result   = $distance->toMillimetres();
		$this->assertEquals($expected, $result, "{$value} in metres cannot be converted to {$expected} millimetres");
	}

	public function testThatOneMetreEqualsOneHundredCentimetres() {
		$value = 1;
		$distance = Distance::createFromMetres($value);
		$expected = 100;
		$result = $distance->toCentimetres();
		$this->assertEquals($expected, $result, "Could not convert {$value} metres to centimetres, {$result} does not equal {$expected} ");
	}

	public function testThatOneMetreEqualsZeroPointOneKilometres() {
		$value = 1;
		$distance = Distance::createFromMetres($value);
		$expected = 0.001;
		$result = number_format($distance->toKilometres(), 4);
		$this->assertEquals($expected, $result, "Could not convert {$value} metres to kilometers, {$result} does not equal {$expected} ");
	}

	public function testThatOneMetreCanBeConvertedToYards(){
		$value = 1;
		$distance = Distance::createFromMetres($value);
		$expected = 1.09361;
		$result = number_format($distance->toYards(), 5);
		$this->assertEquals($expected, $result, "Could not convert {$value} metres to yards, {$result} does not equal {$expected} ");
	}

}
