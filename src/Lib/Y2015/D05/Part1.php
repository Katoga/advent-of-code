<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D05;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
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
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Y2015\D05\Common::isNiceWord()
	 */
	protected function isNiceWord(string $word): bool
	{
		return $this->hasThreeWovels($word) && $this->hasDoubleLetter($word) && $this->lacksBadSequence($word);
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function hasThreeWovels(string $word): bool
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
	protected function hasDoubleLetter(string $word): bool
	{
		$match = preg_match('~([a-z])\1~', $word);

		return $match === 1;
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function lacksBadSequence(string $word): bool
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
