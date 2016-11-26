<?php namespace Perturbatio\Primitives;

use Illuminate\Support\Traits\Macroable;

/**
 * Class Mass
 * @package Perturbatio\Primitives
 */
class Mass {

	use Macroable;

	/**
	 * 1 pound = 0.45359237 kilos
	 */
	const GRAMS_IN_POUND = 453.59237;

	/**
	 * 1 troy pound ~= 373.24
	 */
	const GRAMS_IN_TROY_POUND = 373.24172;

	/**
	 * 1 stone = 6.35029318 kilos
	 */
	const GRAMS_IN_STONE = 6350.29318;

	/**
	 * 1 ton = 1016.05 kilos
	 */
	const GRAMS_IN_METRIC_TONNE = 1000000;

	/**
	 * 1 ton = 1016.05 kilos
	 */
	const GRAMS_IN_IMPERIAL_TON = 1016046.9088;

	/**
	 * 1 US ton = 907.18474 kilos
	 */
	const GRAMS_IN_US_TON = 907184.74;
	/**
	 *
	 */
	const GRAMS_IN_OUNCE = 0.0352739619495805;

	/**
	 * value in grams (metric is the future, even if some people take longer to get there)
	 *
	 * @var Float $value
	 */
	protected $value;

	/**
	 * Mass constructor.
	 *
	 * @param $weight
	 */
	private function __construct( $weight ) {
		$this->value = $weight;
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMicrograms( $value ) {
		return new static($value / 1000 / 1000);
	}
	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMilligrams( $value ) {
		return new static($value / 1000);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromGrams( $value ) {
		return new static($value);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromKilos( $value ) {
		return static::createFromKilograms($value);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromKilograms( $value ) {
		return new static($value * 1000);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMetricTonnes( $value ) {
		return new static($value * 1000 * 1000);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromPounds( $value ) {
		return static::createFromGrams($value * self::GRAMS_IN_POUND);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromStone( $value ) {
		return static::createFromGrams($value * self::GRAMS_IN_STONE);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromTroyPounds( $value ) {
		return static::createFromGrams($value * self::GRAMS_IN_TROY_POUND);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromTroyOunces( $value ) {
		return static::createFromGrams($value * ( self::GRAMS_IN_TROY_POUND / 12 ));
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromOunces( $value ) {
		return static::createFromGrams($value / self::GRAMS_IN_OUNCE);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromImperialTons( $value ) {
		return static::createFromGrams($value * self::GRAMS_IN_IMPERIAL_TON);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromUsTons( $value ) {
		return static::createFromGrams($value * self::GRAMS_IN_US_TON);
	}

	/**
	 * @return Float
	 */
	public function toMilligrams() {
		return $this->toGrams() * 1000;
	}

	/**
	 * @return Float
	 */
	public function toMicrograms() {
		return $this->toGrams() * 1000 * 1000;
	}

	/**
	 * @return Float
	 */
	public function toGrams() {
		return $this->value;
	}

	/**
	 * @return Float
	 */
	public function toKilos() {
		return $this->toKilograms();
	}

	/**
	 * @return Float
	 */
	public function toKilograms() {
		return $this->toGrams() / 1000;
	}

	/**
	 * @return float
	 */
	public function toStone() {
		return $this->toGrams() / self::GRAMS_IN_STONE;
	}

	/**
	 * @return float
	 */
	public function toPounds() {
		return $this->toGrams() / self::GRAMS_IN_POUND;
	}

	/**
	 * @return float
	 */
	public function toTroyPounds() {
		return $this->toGrams() / self::GRAMS_IN_TROY_POUND;
	}

	/**
	 * @return float
	 */
	public function toTroyOunces() {
		return $this->toTroyPounds() * 12;
	}

	/**
	 * @return float
	 */
	public function toOunces() {
		return $this->toGrams() * self::GRAMS_IN_OUNCE;
	}

	/**
	 * @return Float
	 */
	public function toMetricTons() {
		return $this->toMetricTonnes();
	}

	/**
	 * @return Float
	 */
	public function toMetricTonnes() {
		return $this->toGrams() / self::GRAMS_IN_METRIC_TONNE;
	}

	/**
	 * @return Float
	 */
	public function toImperialTons() {
		return $this->toGrams() / self::GRAMS_IN_IMPERIAL_TON;
	}

	/**
	 * @return Float
	 */
	public function toUsTons() {
		return $this->toGrams() / self::GRAMS_IN_US_TON;
	}

	/**
	 * @param Mass $value
	 *
	 * @return Mass
	 */
	public function add( Mass $value ) {
		return static::createFromGrams($this->toGrams() + $value->toGrams());
	}

	/**
	 * @param Mass $value
	 *
	 * @return Mass
	 */
	public function subtract( Mass $value ) {
		return static::createFromGrams($this->toGrams() - $value->toGrams());
	}

	/**
	 * @param float $value
	 *
	 * @return Mass
	 */
	public function multiply( $value ) {
		return static::createFromGrams($this->toGrams() * $value);
	}

	/**
	 * @param float $value
	 *
	 * @return Mass
	 */
	public function divide( $value ) {
		return static::createFromGrams($this->toGrams() / $value);
	}

	/**
	 * @return String
	 */
	public function __toString() {
		return (string) $this->value;
	}
}
