<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D05;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Y2015\D05\Common::isNiceWord()
	 */
	protected function isNiceWord(string $word): bool
	{
		return $this->hasTwinPair($word) && $this->hasInterleaf($word);
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	protected function hasTwinPair(string $word): bool
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
	protected function hasInterleaf(string $word): bool
	{
		$match = preg_match('~([a-z]).\1~', $word);

		return $match === 1;
	}
}
