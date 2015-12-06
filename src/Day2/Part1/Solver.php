<?php
namespace AdventOfCode\Day2\Part1;

use AdventOfCode\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Solver implements SolverInterface
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

		$paper = 0;
		foreach ($boxes as $boxDimensions) {
			$paper += $this->getPaperForBox($boxDimensions);
		}

		return $paper;
	}

	/**
	 *
	 * @param string $boxDimensions
	 * @return int
	 */
	protected function getPaperForBox($boxDimensions)
	{
		$dimensions = explode(self::DIMENSIONS_SEPARATOR, $boxDimensions);

		sort($dimensions, SORT_NUMERIC);
		list($width, $length, $height) = $dimensions;

		$wrap = 2 * $width * $length + 2 * $width * $height + 2 * $length * $height;
		$slack = $width * $length;

		return $wrap + $slack;
	}
}
