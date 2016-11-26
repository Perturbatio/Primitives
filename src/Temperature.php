<?php
namespace Perturbatio\Primitives;

/**
 * Created by kris with PhpStorm.
 * User: kris
 * Date: 26/11/16
 * Time: 02:30
 */
use Illuminate\Support\Traits\Macroable;

/**
 * Class Temperature
 * @package Perturbatio\Primitives
 */
class Temperature {
	use Macroable;

	/**
	 *
	 */
	const KELVIN_TO_CELSIUS = - 273.15;
	const CELSIUS_TO_KELVIN = 273.15;

	/**
	 * Internal value stored in Kelvin
	 *
	 * @var Float $value
	 */
	protected $value;

	private function __construct( $value ) {
		$this->value = (float) $value;
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromKelvin( $value ) {
		return new static($value);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromCelsius( $value ) {
		return static::createFromKelvin($value + self::CELSIUS_TO_KELVIN);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromFarenheit( $value ) {
		return static::createFromKelvin((($value - 32) / 1.8) + self::CELSIUS_TO_KELVIN);
	}

	/**
	 * @return Float
	 */
	public function toKelvin() {
		return $this->value;
	}

	/**
	 * @return Float
	 */
	public function toCelsius() {
		return ($this->toKelvin() + self::KELVIN_TO_CELSIUS);
	}

	/**
	 * @return Float
	 */
	public function toFarenheit() {
		return ($this->toCelsius() * 1.8) + 32;
	}


	/**
	 * @param Temperature $value
	 *
	 * @return Temperature
	 */
	public function add( Temperature $value ) {
		return static::createFromKelvin($this->toKelvin() + $value->toKelvin());
	}

	/**
	 * @param Temperature $value
	 *
	 * @return Temperature
	 */
	public function subtract( Temperature $value ) {
		return static::createFromKelvin($this->toKelvin() - $value->toKelvin());
	}

	/**
	 * @param float $value
	 *
	 * @return Temperature
	 */
	public function multiply( $value ) {
		return static::createFromKelvin($this->toKelvin() * $value);
	}

	/**
	 * @param float $value
	 *
	 * @return Temperature
	 */
	public function divide( $value ) {
		return static::createFromKelvin($this->toKelvin() / $value);
	}

	/**
	 * @return String
	 */
	public function __toString() {
		return (string) $this->value;
	}
}
