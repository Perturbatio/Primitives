<?php
namespace Perturbatio\Primitives\Traits;

use BadMethodCallException;
use Closure;

/**
 * Created by Kris with PhpStorm.
 * Date: 27/11/2016
 * Time: 23:50
 */
Trait Formatter {

	/**
	 * Returns a formatted string
	 *
	 * @param $string
	 *
	 * @return mixed
	 */
	public function format( $string ) {
		$result = $string;
		if ( !empty($this->formatters)) {
			$matches = [];
			preg_match_all('/\{([A-Za-z]\w+):?(.*?)\}/', $result, $matches);

			if (count($matches) > 1) {
				foreach ($matches[1] as $key => $match) {
					$formatterFunction = $this->formatters[ $match ];
					$params            = explode('|', $matches[2][ $key ]);
					$result            = str_replace("{$matches[0][$key]}", call_user_func_array([
						$this,
						$formatterFunction,
					], $params), $result);

				}
			}
		}

		return $result;
	}


	/**
	 * Dynamically handle calls to the class. (replaces the __call method in the macroable trait)
	 *
	 * @param  string $method
	 * @param  array  $parameters
	 *
	 * @return mixed
	 *
	 * @throws \BadMethodCallException
	 */
	public function __call( $method, $parameters ) {
		if ((method_exists($this, 'hasMacro') && !static::hasMacro($method)) && !is_callable(['parent', '__call'])) {
			if (starts_with($method, 'formatter')) {
				return $this->handle_formatter_call($method, $parameters);
			}
			throw new BadMethodCallException("Method {$method} does not exist.");
		}

		if (isset(static::$macros)) {
			if (static::$macros[ $method ] instanceof Closure) {
				return call_user_func_array(static::$macros[ $method ]->bindTo($this, static::class), $parameters);
			}

			return call_user_func_array(static::$macros[ $method ], $parameters);
		} else {

			return call_user_func_array($method, $parameters);
		}
	}

	/**
	 *
	 * @param  string $method
	 * @param  array  $parameters
	 *
	 * @return mixed
	 */
	protected function handle_formatter_call( $method, $parameters ) {

		$method        = str_replace_first('formatter_', '', snake_case($method));
		$methodParts   = explode('_', $method);
		$partsCombined = '';
		$value         = null;
		$valueObtained = false;

		while ($part = array_shift($methodParts)) {
			$partsCombined .= ucfirst($part);

			if ( !$valueObtained && method_exists($this, 'to' . $partsCombined)) {
				$toMethod      = 'to' . $partsCombined;
				$partsCombined = '';
				$value         = $this->$toMethod();
				$valueObtained = true;
			}

			if ($valueObtained && method_exists($this, 'transformer' . $partsCombined)) {
				$transformMethod = 'transformer' . $partsCombined;

				$value         = $this->$transformMethod($value, $methodParts);
				$partsCombined = '';
			}
		}

		return $value;
	}

}
