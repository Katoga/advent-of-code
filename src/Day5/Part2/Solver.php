<?php
namespace AdventOfCode\Day5\Part2;

use AdventOfCode\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Solver implements SolverInterface
{

	/**
	 *
	 * @var array
	 */
	protected $vovels = [
		97,
		101,
		105,
		111,
		117
	];

	protected $badSequences = [
		'ab',
		'cd',
		'pq',
		'xy'
	];

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$cnt = 0;

		$words = explode(PHP_EOL, $input);

		foreach ($words as $word) {
			if ($this->hasTwinPair($word) && $this->hasInterleaf($word)) {
				$cnt++;
			}
		}

		return $cnt;
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function hasTwinPair($word)
	{
		$passes = false;

		$wordLength = strlen($word);

		for ($mainPosition = 0; $mainPosition <= $wordLength - 4; $mainPosition++) {
			if ($passes) {
				break;
			}
			$main = substr($word, $mainPosition, 2);
			for ($twinPosition = $mainPosition + 2; $twinPosition <= $wordLength - 2; $twinPosition++) {
				$twin = substr($word, $twinPosition, 2);

				if ($twin == $main) {
					$passes = true;
					break;
				}
			}
		}

		return $passes;
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function hasInterleaf($word)
	{
		$match = preg_match('~([a-z]).\1~', $word);

		return $match === 1;
	}
}
