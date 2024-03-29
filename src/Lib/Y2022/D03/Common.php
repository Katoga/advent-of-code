<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D03;

use AdventOfCode\Lib\SolverInterface;
use RuntimeException;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 * @return array<string, int>
	 */
	protected function getCharPriorities(): array
	{
		return array_combine(range('a', 'z'), range(1, 26)) + array_combine(range('A', 'Z'), range(27, 52));
	}
}
