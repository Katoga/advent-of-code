<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day10;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
interface SolverInterface extends \AdventOfCode\Lib\SolverInterface
{

	/**
	 *
	 * @param int $iterations
	 */
	public function setIterations($iterations);
}
