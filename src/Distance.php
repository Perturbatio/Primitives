<?php
namespace Perturbatio\Primitives;

use Illuminate\Support\Traits\Macroable;

/**
 * Class Distance
 * @package Perturbatio\Primitives
 */
class Distance {
	use Macroable;

	const MM_IN_INCHES = 0.039370;
	const ONE_MILE_IN_FEET = 5280;

	/**
	 * Internally store as mm
	 * @var float $value
	 */
	protected $value;

	/**
	 * Distance constructor.
	 *
	 * @param $value
	 */
	private function __construct( $value ) {
		$this->value = $value;
	}

	/**
	 * @param float $value
	 *
	 * @return Distance
	 */
	public static function createFromNanometers( $value ) {
		return static::createFromNanometres($value);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromNanometres( $value ) {
		return new static($value * 1000 * 1000);
	}

	/**
	 * @param float $value
	 *
	 * @return Distance
	 */
	public static function createFromMicrometers( $value ) {
		return static::createFromMicrometres($value);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromMicrometres( $value ) {
		return new static($value * 1000);
	}

	/**
	 * @param float $value
	 *
	 * @return Distance
	 */
	public static function createFromMillimeters( $value ) {
		return static::createFromMillimetres($value);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromMillimetres( $value ) {
		return new static($value);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromMeters( $value ) {
		return static::createFromMetres($value);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromMetres( $value ) {
		return new static($value * 1000);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromKilometers( $value ) {
		return static::createFromKilometres($value);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromKilometres( $value ) {
		return new static($value * 1000 * 1000);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromInches( $value ) {
		return new static($value / static::MM_IN_INCHES);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromFeet( $value ) {
		return new static(($value * 12) / static::MM_IN_INCHES);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromYards( $value ) {
		return new static((($value * 3) * 12) / static::MM_IN_INCHES);
	}

	/**
	 * @param float $value
	 *
	 * @return static
	 */
	public static function createFromMiles( $value ) {
		return new static((($value * static::ONE_MILE_IN_FEET) * 12) / static::MM_IN_INCHES);
	}

	/**
	 * @return float
	 */
	public function toNanometers() {
		return $this->toNanometres();
	}

	/**
	 * @return float
	 */
	public function toNanometres() {
		return $this->toMillimetres() / 1000 / 1000;
	}

	/**
	 * @return float
	 */
	public function toMicrometers() {
		return $this->toMicrometres();
	}

	/**
	 * @return float
	 */
	public function toMicrometres() {
		return $this->toMillimetres() / 1000;
	}

	/**
	 * @return float
	 */
	public function toMillimeters() {
		return $this->toMillimetres();
	}

	/**
	 * @return float
	 */
	public function toMillimetres() {
		return $this->value;
	}


	/**
	 * @return float
	 */
	public function toCentimeters() {
		return $this->toCentimetres();
	}

	/**
	 * @return float
	 */
	public function toCentimetres() {
		return $this->toMillimetres() / 10;
	}

	/**
	 * @return float
	 */
	public function toMeters() {
		return $this->toMetres();
	}

	/**
	 * @return float
	 */
	public function toMetres() {
		return $this->toMillimetres() / 1000;
	}

	/**
	 * @return float
	 */
	public function toKilometers() {
		return $this->toKilometres();
	}

	/**
	 * @return float
	 */
	public function toKilometres() {
		return $this->toMeters() / 1000;
	}

	/**
	 * @return float
	 */
	public function toInches() {
		return $this->toMillimetres() * static::MM_IN_INCHES;
	}

	/**
	 * @return float
	 */
	public function toFeet() {
		return $this->toInches() / 12;
	}

	/**
	 * @return float
	 */
	public function toYards() {
		return $this->toFeet() / 3;
	}

	/**
	 * @return float
	 */
	public function toMiles() {
		return $this->toYards() / 1760;
	}

}
