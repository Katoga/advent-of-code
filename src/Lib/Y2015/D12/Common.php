<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D12;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-15
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$array = json_decode($input, true);

		$solution = $this->sum($array);

		return $solution;
	}

	/**
	 *
	 * @param array $array
	 * @return int
	 */
	abstract protected function sum(array $array): int;
}
