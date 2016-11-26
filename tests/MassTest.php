<?php
namespace Perturbatio\Primitives\Tests;
use Perturbatio\Primitives\Mass;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

class MassTest extends \Orchestra\Testbench\TestCase {

	//------------------[ Test input equals output ]------------------//

	//------------------[ Metric ]------------------//

	public function testThatOutputMassEqualsInputMassInMicrograms() {
		$value = 1000;
		$mass = Mass::createFromMicrograms($value);
		$this->assertEquals($value, $mass->toMicrograms(), "Output mass in Grams {$mass->toMicrograms()} does not equal input mass in Grams {$value}");
	}

	public function testThatOutputMassEqualsInputMassInMilligrams() {
		$value = 1000;
		$mass  = Mass::createFromMilligrams($value);
		$this->assertEquals($value, $mass->toMilligrams(), "Output mass in Milligrams {$mass->toMilligrams()} does not equal input mass in Milligrams {$value}");
	}

	public function testThatOutputMassEqualsInputMassInGrams() {
		$value = 1000;
		$mass = Mass::createFromGrams($value);
		$this->assertEquals($value, $mass->toGrams(), "Output mass in Grams {$mass->toGrams()} does not equal input mass in Grams {$value}");
	}

	public function testThatOutputMassEqualsInputMassInKilograms() {
		$value = 1000;
		$mass = Mass::createFromKilograms($value);
		$this->assertEquals($value, $mass->toKilograms(), "Output mass in Kilograms {$mass->toKilograms()} does not equal input mass in Kilograms {$value}");
	}

	public function testThatOuputMassEqualsInputMassInMetricTonnes() {
		$value = 1;
		$mass  = Mass::createFromMetricTonnes($value);
		$this->assertEquals($value, $mass->toMetricTonnes(), "Output mass in Metric Tonnes {$mass->toMetricTonnes()} does not equal input mass in Metric Tonnes {$value}");
	}

	//------------------[ Imperial ]------------------//

	public function testThatOuputMassEqualsInputMassInOunces() {
		$value = 1;
		$mass  = Mass::createFromOunces($value);
		$this->assertEquals($value, $mass->toOunces(), "Output mass in Ounces {$mass->toOunces()} does not equal input mass in Ounces {$value}");
	}

	public function testThatOuputMassEqualsInputMassInTroyOunces() {
		$value = 1;
		$mass  = Mass::createFromTroyOunces($value);
		$this->assertEquals($value, $mass->toTroyOunces(), "Output mass in Troy Ounces {$mass->toTroyOunces()} does not equal input mass in Troy Ounces {$value}");
	}

	public function testThatOuputMassEqualsInputMassInPounds() {
		$value = 1;
		$mass  = Mass::createFromPounds($value);
		$this->assertEquals($value, $mass->toPounds(), "Output mass in Pounds {$mass->toPounds()} does not equal input mass in Pounds {$value}");
	}

	public function testThatOuputMassEqualsInputMassInTroyPounds() {
		$value = 1;
		$mass  = Mass::createFromTroyPounds($value);
		$this->assertEquals($value, $mass->toTroyPounds(), "Output mass in Troy Pounds {$mass->toTroyPounds()} does not equal input mass in Troy Pounds {$value}");
	}

	public function testThatOuputMassEqualsInputMassInStone() {
		$value = 1;
		$mass  = Mass::createFromStone($value);
		$this->assertEquals($value, $mass->toStone(), "Output mass in Pounds {$mass->toStone()} does not equal input mass in Pounds {$value}");
	}

	public function testThatOuputMassEqualsInputMassInImperialTons() {
		$value = 1;
		$mass  = Mass::createFromImperialTons($value);
		$this->assertEquals($value, $mass->toImperialTons(), "Output mass in Imperial Tons {$mass->toImperialTons()} does not equal input mass in Imperial Tons {$value}");
	}

	public function testThatOuputMassEqualsInputMassInUSTons() {
		$value = 1;
		$mass  = Mass::createFromUsTons($value);
		$this->assertEquals($value, $mass->toUsTons(), "Output mass in US Tons {$mass->toUsTons()} does not equal input mass in US Tons {$value}");
	}

	//------------------[ test conversion to units in same system ]------------------//

	public function testThatOneThousandGramsEqualsOneKilogram() {
		$value = 1000;
		$mass = Mass::createFromGrams($value);
		$this->assertEquals(1, $mass->toKilograms(), "1000 Grams doesn't equal 1 Kilograms");
	}

	public function testThatOneMillionGramsEqualsOneMetricTonne() {
		$value = 1000000;
		$mass = Mass::createFromGrams($value);
		$expected = 1;
		$this->assertEquals($expected, $mass->toMetricTonnes(), "{$value} Grams doesn't equal {$expected} MetricTonne");
	}

	//------------------[ test that metric can be converted to imperial correctly ]------------------//

	public function testThatOneStoneCanBeConvertedIntoGrams(){
		$value = 1;
		$mass = Mass::createFromStone($value);
		$expected = 6350.29;
		$result = number_format($mass->toGrams(), 2, '.','');
		$this->assertEquals($expected, $result, "{$value} Stone should be {$expected} but {$result} returned");
	}
	public function testThatOneImperialTonCanBeConvertedIntoGrams(){
		$value = 1;
		$mass = Mass::createFromImperialTons($value);
		$expected = 1016046.9088;
		$result = number_format($mass->toGrams(), 4, '.','');
		$this->assertEquals($expected, $result, "{$value} Imperial Ton should be {$expected} but {$result} returned");
	}

	//------------------[ Test operations ]------------------//
	public function testThatOneMassCanBeAddedToAnother(){
		$firstValue = 10;
		$secondValue = 5;
		$expectedResult = 15;
		$firstMass = Mass::createFromGrams($firstValue);
		$secondMass = Mass::createFromGrams($secondValue);
		$result = $firstMass->add($secondMass);
		$this->assertEquals($expectedResult, $result->toGrams(), "Add operation failed expected value {$expectedResult} was not equal to result {$result->toGrams()}");
	}

	public function testThatOneMassCanBeSubtractedFromAnother(){
		$firstValue = 10;
		$secondValue = 5;
		$expectedResult = 5;
		$firstMass = Mass::createFromGrams($firstValue);
		$secondMass = Mass::createFromGrams($secondValue);
		$result = $firstMass->subtract($secondMass);
		$this->assertEquals($expectedResult, $result->toGrams(), "Subtract operation failed expected value {$expectedResult} was not equal to result {$result->toGrams()}");
	}

	public function testThatOneMassCanBeDividedByAValue(){
		$firstValue = 10;
		$divisor = 5;
		$expectedResult = 2;
		$firstMass = Mass::createFromGrams($firstValue);
		$result = $firstMass->divide($divisor);
		$this->assertEquals($expectedResult, $result->toGrams(), "Divide operation failed expected value {$expectedResult} was not equal to result {$result->toGrams()}");
	}

	public function testThatOneMassCanBeMultipliedByAValue(){
		$firstValue = 10;
		$multiplier = 5;
		$expectedResult = 50;
		$firstMass = Mass::createFromGrams($firstValue);
		$result = $firstMass->multiply($multiplier);
		$this->assertEquals($expectedResult, $result->toGrams(), "Multiply operation failed expected value {$expectedResult} was not equal to result {$result->toGrams()}");
	}

	public function testThatTheMassCanBeRenderedAsAString(){
		$mass = Mass::createFromGrams(10);
		$this->assertEquals('10', $mass->__toString(), "toString method failed to render the value in grams correctly");
	}

}
