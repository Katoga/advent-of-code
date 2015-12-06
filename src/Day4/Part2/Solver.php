<?php
namespace AdventOfCode\Day4\Part2;

use AdventOfCode\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Solver implements SolverInterface
{

	/**
	 *
	 * @var string
	 */
	protected $secretKey;

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$this->secretKey = $input;

		// result from Day4, Part1
		$number = 282749;

		while (!$this->hashStartsWithSixZeroes($number)) {
			$number++;
		}

		return $number;
	}

	protected function hashStartsWithSixZeroes($number)
	{
		$string = sprintf('%s%d', $this->secretKey, $number);
		$hash = md5($string);

		$chunk = substr($hash, 0, 5);

		return $chunk === '000000';
	}
}
