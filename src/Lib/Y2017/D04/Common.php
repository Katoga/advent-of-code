<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D04;

use AdventOfCode\Lib\SolverInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$validPassphrases = 0;

		$rows = explode("\n", $input);

		foreach ($rows as $row) {
			if (!empty($row)) {
				if ($this->isValidPassphrase($row)) {
					$validPassphrases++;
				}
			}
		}

		return $validPassphrases;
	}

	/**
	 * @param string $phrase
	 * @return bool
	 */
	abstract protected function isValidPassphrase(string $phrase): bool;
}
