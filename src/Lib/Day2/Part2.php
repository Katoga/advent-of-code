<?php
namespace AdventOfCode\Lib\Day2;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 implements SolverInterface
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

		$ribbon = 0;
		foreach ($boxes as $boxDimensions) {
			$ribbon += $this->getRibbonForBox($boxDimensions);
		}

		return $ribbon;
	}

	/**
	 *
	 * @param string $boxDimensions
	 * @return int
	 */
	protected function getRibbonForBox($boxDimensions)
	{
		$dimensions = explode(self::DIMENSIONS_SEPARATOR, $boxDimensions);

		sort($dimensions, SORT_NUMERIC);
		list($width, $length, $height) = $dimensions;

		$wrap = 2 * $width + 2 * $length;
		$bow = $width * $length * $height;

		return $wrap + $bow;
	}
}
