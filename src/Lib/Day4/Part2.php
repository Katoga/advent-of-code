<?php
namespace AdventOfCode\Lib\Day4;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 implements SolverInterface
{

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
			// result from Day4, Part1
		$number = 282749;

		$string = '';

		do {
			$number++;
			$string = substr(md5($input . $number), 0, 6);
			if ($number % 1000000 == 0) {
				echo $number . PHP_EOL;
			}
		} while ($string !== '000000');

		return $number;
	}
}
