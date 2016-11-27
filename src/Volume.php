<?php
namespace Perturbatio\Primitives;

	/**
	 * Created by kris with PhpStorm.
	 * User: kris
	 * Date: 26/11/16
	 * Time: 12:24
	 */
/**
 * Class Volume
 * @package Perturbatio\Primitives
 */
class Volume {

	/**
	 * @var float $value
	 */
	private $value;

	const IMPERIAL_FLOZ_IN_ML = 0.035195080;
	const US_FLOZ_IN_ML = 0.033814;
	const IMPERIAL_GALLONS_IN_ML = 0.0002199692482991;
	const US_GALLONS_LIQUID_IN_ML = 0.00026417;
	const US_GALLONS_DRY_IN_ML = 0.00022702;

	/**
	 * Volume constructor.
	 *
	 * @param $value
	 */
	private function __construct($value){
		$this->value = $value;
	}


	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMillilitres($value) {
		return new static((float)$value);
	}

	/**
	 * @param $value
	 *
	 * @return Volume
	 */
	public static function createFromLitres($value) {
		$value = (float)$value;
		return static::createFromMillilitres($value * 1000);

	}

	/**
	 * @param $value
	 *
	 * @return Volume
	 */
	public static function createFromUSOunces($value) {
		$value = (float)$value;
		return static::createFromMillilitres($value / self::US_FLOZ_IN_ML);
	}

	/**
	 * @param $value
	 *
	 * @return Volume
	 */
	public static function createFromImperialOunces($value) {
		$value = (float)$value;
		return static::createFromMillilitres($value / self::IMPERIAL_FLOZ_IN_ML);
	}

	/**
	 * @param $value
	 *
	 * @return Volume
	 */
	public static function createFromImperialGallons( $value ) {
		$value = (float) $value;

		return static::createFromMillilitres($value / self::IMPERIAL_GALLONS_IN_ML);
	}

	/**
	 * @param $value
	 *
	 * @return Volume
	 */
	public static function createFromUSLiquidGallons($value) {
		$value = (float)$value;
		return static::createFromMillilitres($value / self::US_GALLONS_LIQUID_IN_ML);

	}
	/**
	 * @param $value
	 *
	 * @return Volume
	 */
	public static function createFromUSDryGallons($value) {
		$value = (float)$value;
		return static::createFromMillilitres($value / self::US_GALLONS_DRY_IN_ML);

	}

	/**
	 * @return float
	 */
	public function toMillilitres() {
		return $this->value;
	}

	/**
	 * @return float
	 */
	public function toLitres() {
		return $this->value / 1000;
	}

	/**
	 * @return float
	 */
	public function toImperialOunces() {
		return $this->value * static::IMPERIAL_FLOZ_IN_ML;
	}

	/**
	 * @return float
	 */
	public function toUSOunces() {
		return $this->value * static::US_FLOZ_IN_ML;
	}

	/**
	 * @return float
	 */
	public function toImperialGallons() {
		return $this->value * static::IMPERIAL_GALLONS_IN_ML;
	}

	/**
	 * @return float
	 */
	public function toUSLiquidGallons() {
		return $this->value * static::US_GALLONS_LIQUID_IN_ML;
	}

	/**
	 * @return float
	 */
	public function toUSDryGallons() {
		return $this->value * static::US_GALLONS_DRY_IN_ML;
	}

}
