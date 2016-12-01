<?php namespace Perturbatio\Primitives;

use Illuminate\Support\Traits\Macroable;
use Perturbatio\Primitives\Traits\Formatter;

/**
 * Class Mass
 * @package Perturbatio\Primitives
 */
class Mass {

	protected $formatters = [
		'micrograms'        => "formatterMicrograms",
		'milligrams'        => "formatterMilligrams",
		'grams'             => "formatterGrams",
		'kilograms'         => "formatterKilograms",
		'metricTonnes'      => "formatterMetricTonnes",
		'pounds'            => "formatterPounds",
		'stones'            => "formatterStones",
		'troyPounds'        => "formatterTroyPounds",
		'troyOunces'        => "formatterTroyOunces",
		'ounces'            => "formatterOunces",
		'imperialTons'      => "formatterImperialTons",
		'usTons'            => "formatterUsTons",
		'remainderPounds'   => "formatterRemainderToPounds",
		'remainderToOunces' => "formatterRemainderToOunces",
	];

	use Macroable;
	use Formatter {
		Formatter::__call insteadof Macroable;
	}

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

	const UNIT_MICROGRAMS = 0;
	const UNIT_MILLIGRAMS = 1;
	const UNIT_GRAMS = 2;
	const UNIT_KILOGRAMS = 3;
	const UNIT_METRIC_TONNES = 4;
	const UNIT_POUNDS = 5;
	const UNIT_STONES = 6;
	const UNIT_TROY_POUNDS = 7;
	const UNIT_TROY_OUNCES = 8;
	const UNIT_OUNCES = 9;
	const UNIT_IMPERIAL_TONS = 10;
	const UNIT_US_TONS = 11;

	/**
	 * value in grams (metric is the future, even if some people take longer to get there)
	 *
	 * @var Float $value
	 */
	protected $value;
	protected $currentUnit;

	/**
	 * Mass constructor.
	 *
	 * @param $weight
	 */
	private function __construct( $weight, $unit ) {
		$this->value       = $weight;
		$this->currentUnit = $unit;
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMicrograms( $value ) {
		return new static($value / 1000 / 1000, static::UNIT_MICROGRAMS);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMilligrams( $value ) {
		return new static($value / 1000, static::UNIT_MILLIGRAMS);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromGrams( $value ) {
		return new static($value, static::UNIT_GRAMS);
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
		return new static($value * 1000, static::UNIT_KILOGRAMS);
	}

	/**
	 * @param $value
	 *
	 * @return static
	 */
	public static function createFromMetricTonnes( $value ) {
		return new static($value * 1000 * 1000, static::UNIT_METRIC_TONNES);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromPounds( $value ) {
		return new static($value * self::GRAMS_IN_POUND, static::UNIT_POUNDS);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromStone( $value ) {
		return new static($value * self::GRAMS_IN_STONE, static::UNIT_STONES);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromTroyPounds( $value ) {
		return new static($value * self::GRAMS_IN_TROY_POUND, static::UNIT_TROY_POUNDS);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromTroyOunces( $value ) {
		return new static($value * (self::GRAMS_IN_TROY_POUND / 12), static::UNIT_TROY_OUNCES);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromOunces( $value ) {
		return new static($value / self::GRAMS_IN_OUNCE, static::UNIT_OUNCES);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromImperialTons( $value ) {
		return new static($value * self::GRAMS_IN_IMPERIAL_TON, static::UNIT_IMPERIAL_TONS);
	}

	/**
	 * @param $value
	 *
	 * @return Mass
	 */
	public static function createFromUsTons( $value ) {
		return new static($value * self::GRAMS_IN_US_TON, static::UNIT_US_TONS);
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

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return float
	 */
	public function formatterRemainderToOunces( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {
		return number_format(Mass::createFromPounds($this->toPounds() - floor($this->toPounds()))->toOunces(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterPounds( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {
		return number_format($this->toPounds(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterOunces( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {
		return number_format($this->toOunces(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterMicrograms( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {
		return number_format($this->toMicrograms(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterMilligrams( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {
		return number_format($this->toMilligrams(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterGrams( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toGrams(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterKilograms( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toKilograms(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterMetricTonnes( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toMetricTonnes(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterStones( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toStone(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterTroyPounds( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toTroyPounds(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterTroyOunces( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toTroyOunces(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterImperialTons( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toImperialTons(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterUsTons( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format($this->toUsTons(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param int    $decimals
	 * @param string $dec_point
	 * @param string $thousands_separator
	 *
	 * @return string
	 */
	public function formatterRemainderToPounds( $decimals = 2, $dec_point = '.', $thousands_separator = ',' ) {

		return number_format(Mass::createFromPounds($this->toStone() - floor($this->toStone()))->toPounds(), $decimals, $dec_point, $thousands_separator);
	}

	/**
	 * @param $value
	 *
	 * @return float
	 */
	public function transformerPoundsToOunces( $value ) {
		return Mass::createFromPounds($value)->toOunces();
	}

	/**
	 * @param $value
	 *
	 * @return float
	 */
	public function transformerOuncesToPounds( $value ) {
		return Mass::createFromOunces($value)->toPounds();
	}


	/**
	 * @param $value
	 *
	 * @return float
	 */
	protected function transformerRemainder( $value ) {
		return $value - floor($value);
	}

	/**
	 * @param $value
	 *
	 * @return float
	 */
	protected function transformerFloor( $value ) {
		return floor($value);
	}

	/**
	 * @param $value
	 *
	 * @return float
	 */
	protected function transformerCeil( $value ) {
		return ceil($value);
	}

	/**
	 * @param $value
	 *
	 * @return float
	 */
	protected function transformerRound( $value ) {
		return round($value);
	}

	/**
	 * @param $value
	 *
	 * @return string
	 */
	protected function transformerUcfirst( $value ) {
		return ucfirst($value);
	}

	/**
	 * @param $value
	 *
	 * @return string
	 */
	protected function transformerUppercase( $value ) {
		return mb_strtoupper($value);
	}

	/**
	 * @param $value
	 *
	 * @return string
	 */
	protected function transformerLowercase( $value ) {
		return mb_strtolower($value);
	}

	/**
	 * @param $value
	 *
	 * @return string
	 */
	protected function transformerCamelcase( $value ) {
		return camel_case($value);
	}


}
