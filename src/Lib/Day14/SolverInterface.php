<?php
namespace AdventOfCode\Lib\Day14;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-15
 * @license https://opensource.org/licenses/ISC ISC licence
 */
interface SolverInterface extends \AdventOfCode\Lib\SolverInterface
{

	/**
	 *
	 * @param int $seconds
	 */
	public function setDuration($seconds);
}
