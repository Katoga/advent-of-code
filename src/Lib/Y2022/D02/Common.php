<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D02;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-02
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	protected const ROCK_OPFOR = 'A';
	protected const PAPER_OPFOR = 'B';
	protected const SCISSORS_OPFOR = 'C';

	protected const POINTS_WIN = 6;
	protected const POINTS_TIE = 3;
	protected const POINTS_LOSE = 0;

	protected const POINTS_ROCK = 1;
	protected const POINTS_PAPER = 2;
	protected const POINTS_SCISSORS = 3;

	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$rows = explode(PHP_EOL, $input);

		$points = 0;
		foreach ($rows as $row) {
			if ($row) {
				$points += $this->getPointsForRound($row);
			}
		}

		return $points;
	}

	abstract protected function getPointsForRound(string $round): int;
}
