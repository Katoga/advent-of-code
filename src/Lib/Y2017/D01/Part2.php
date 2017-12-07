<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D01;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$length = strlen($input);

		// duplicate the list - it is circular and the jump is long
		return $this->getSum($input . $input, $length, $length / 2);
	}
}
