<?php
namespace AdventOfCode;

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
	public function getSolution($input);
}
