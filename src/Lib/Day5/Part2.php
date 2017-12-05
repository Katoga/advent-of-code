<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day5;

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
	 * @see \AdventOfCode\Lib\Day5\Common::isNiceWord()
	 */
	protected function isNiceWord($word)
	{
		return $this->hasTwinPair($word) && $this->hasInterleaf($word);
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
