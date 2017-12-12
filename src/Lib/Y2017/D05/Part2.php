<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D05;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
  /**
   * @param int $offset
   * @return int
   */
  protected function getChange(int $offset): int
  {
    if ($offset >= 3) {
      $change = -1;
    } else {
      $change = +1;
    }

    return $change;
  }
}
