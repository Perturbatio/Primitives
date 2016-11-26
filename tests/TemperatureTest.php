<?php
namespace Perturbatio\Primitives\Tests;

use Perturbatio\Primitives\Temperature;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

class TemperatureTest extends \Orchestra\Testbench\TestCase {
	//------------------[ Test unit to unit conversion ]------------------//
	public function testThatKelvinConvertsToKelvin() {
		$value = 1;
		$temperature = Temperature::createFromKelvin($value);
		$expected = 1;
		$result = $temperature->toKelvin();
		$this->assertEquals($expected, $result, "Cannot convert Kelvin to Kelvin, expected {$expected}, got {$result}");
	}

	public function testThatCelsiusConvertsToCelsius() {
		$value = 1;
		$temperature = Temperature::createFromCelsius($value);
		$expected = 1;
		$result = $temperature->toCelsius();
		$this->assertEquals($expected, $result, "Cannot convert Celsius to Celsius, expected {$expected}, got {$result}");
	}

	public function testThatFarenheitConvertsToFarenheit() {
		$value = 1;
		$temperature = Temperature::createFromFarenheit($value);
		$expected = 1;
		$result = $temperature->toFarenheit();
		$this->assertEquals($expected, $result, "Cannot convert Farenheit to Farenheit, expected {$expected}, got {$result}");
	}

	//------------------[ convert between units ]------------------//

	public function testThatCelsiusConvertsToFarenheit() {
		$value       = 1;
		$temperature = Temperature::createFromCelsius($value);
		$expected    = 33.8000;
		$result      = number_format($temperature->toFarenheit(), 4);
		$this->assertEquals($expected, $result, "Cannot convert Celsius to Farenheit, expected {$expected}, got {$result}");
	}

	public function testThatFarenheitConvertsToCelsius() {
		$value       = 1;
		$temperature = Temperature::createFromFarenheit($value);
		$expected    = -17.2222;
		$result      = number_format($temperature->toCelsius(), 4);
		$this->assertEquals($expected, $result, "Cannot convert Farenheit to Celsius, expected {$expected}, got {$result}");
	}

	public function testThatKelvinConvertsToCelcius() {
		$value = 1;
		$temperature = Temperature::createFromKelvin($value);
		$expected = -272.15;
		$result = number_format($temperature->toCelsius(), 2);
		$this->assertEquals($expected, $result, "Cannot convert Kelvin to Celsius, expected {$expected}, got {$result}");
	}
}
