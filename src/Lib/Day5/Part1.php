<?php
namespace AdventOfCode\Lib\Day5;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 implements SolverInterface
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
			if ($this->hasThreeWovels($word) && $this->hasDoubleLetter($word) && $this->lacksBadSequence($word)) {
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
	protected function hasThreeWovels($word)
	{
		$passes = false;

		$chars = count_chars($word, 1);

		$cnt = 0;
		foreach ($this->vovels as $vovel) {
			if (!empty($chars[$vovel])) {
				$cnt += $chars[$vovel];
			}
			if ($cnt >= 3) {
				$passes = true;
				break;
			}
		}

		return $passes;
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function hasDoubleLetter($word)
	{
		$match = preg_match('~([a-z])\1~', $word);

		return $match === 1;
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function lacksBadSequence($word)
	{
		$passes = true;

		foreach ($this->badSequences as $badSequence) {
			if (strpos($word, $badSequence) !== false) {
				$passes = false;
				break;
			}
		}

		return $passes;
	}
}
