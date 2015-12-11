<?php
namespace AdventOfCode\Lib\Day4;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-11
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$secret = 0;

		$string = '';

		$zeros = str_repeat('0', static::LEADING_ZEROS);

		do {
			$secret++;
			$string = substr(md5($input . $secret), 0, static::LEADING_ZEROS);
			if ($secret % 1000000 == 0) {
				echo $secret . PHP_EOL;
			}
		} while ($string !== $zeros);

		return $secret;
	}
}
