<?php
namespace AdventOfCode\Lib\Day4;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 implements SolverInterface
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

		$number = 1;

		while (!$this->hashStartsWithFiveZeroes($number)) {
			$number++;
		}

		return $number;
	}

	protected function hashStartsWithFiveZeroes($number)
	{
		$string = sprintf('%s%d', $this->secretKey, $number);
		$hash = md5($string);

		$chunk = substr($hash, 0, 5);

		return $chunk === '00000';
	}
}
