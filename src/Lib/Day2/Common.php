<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day2;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-11
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	const DIMENSIONS_SEPARATOR = 'x';

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$boxes = explode(PHP_EOL, $input);

		$amount = 0;
		foreach ($boxes as $boxDimensions) {
			$amount += $this->getAmountForBox($boxDimensions);
		}

		return $amount;
	}

	/**
	 *
	 * @param string $boxDimensions
	 * @return int
	 */
	protected function getAmountForBox(string $boxDimensions): int
	{
		$dimensions = explode(self::DIMENSIONS_SEPARATOR, $boxDimensions);

		array_walk($dimensions, function(string &$item) { $item = (int) $item; });

		sort($dimensions, SORT_NUMERIC);
		list($width, $length, $height) = $dimensions;

		$wrap = $this->getWrapAmount($width, $length, $height);
		$extra = $this->getExtraAmount($width, $length, $height);

		return $wrap + $extra;
	}

	/**
	 *
	 * @param int $width
	 * @param int $length
	 * @param int $height
	 * @return int
	 */
	abstract protected function getWrapAmount(int $width, int $length, int $height): int;

	/**
	 *
	 * @param int $width
	 * @param int $length
	 * @param int $height
	 * @return int
	 */
	abstract protected function getExtraAmount(int $width, int $length, int $height): int;
}
