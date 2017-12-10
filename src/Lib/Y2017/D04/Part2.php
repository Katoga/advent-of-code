<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D04;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
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
        $words = preg_split('~[\s]+~', $row);
        foreach ($words as &$word) {
          $chars = str_split($word);
          sort($chars);
          $word = implode('', $chars);
        }
        if (count(array_unique($words)) == count($words)) {
          $validPassphrases++;
        }
      }
    }

		return $validPassphrases;
	}
}
