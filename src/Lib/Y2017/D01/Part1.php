<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D01;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		// append first char to the end - the list is circular
		return $this->getSum($input . substr($input, 0, 1), strlen($input),  1);
	}
}
