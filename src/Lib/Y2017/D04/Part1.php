<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D04;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 * @param string $phrase
	 * @return bool
	 */
	protected function isValidPassphrase(string $phrase): bool
	{
		$words = preg_split('~[\s]+~', $phrase);
		if ($words === false) {
			throw new RuntimeException('Failed to process passphrase.');
		}

		return count(array_unique($words)) == count($words);
	}
}
