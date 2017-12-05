<?php
declare(strict_types=1);

namespace AdventOfCode\Lib;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
interface SolverInterface
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int;
}
