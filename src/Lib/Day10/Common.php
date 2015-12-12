<?php
namespace AdventOfCode\Lib\Day10;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{

	/**
	 *
	 * @var int
	 */
	protected $iterations;

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$solution = 0;

		$string = $input;
		for ($i = 0; $i < $this->iterations; $i++) {
			$string = $this->lookAndSay($string);
		}

		return strlen($string);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Day10\SolverInterface::setIterations()
	 */
	public function setIterations($iterations)
	{
		if ($iterations > 40) {
			ini_set('memory_limit', '1G');
		}

		$this->iterations = $iterations;
	}

	/**
	 *
	 * @param string $string
	 * @return string
	 */
	protected function lookAndSay($string) {
		$result = '';

		$numbers = str_split($string);

		$last = 0;
		$repetitions = 0;
		foreach ($numbers as $number) {
			if ($last != 0 && $number != $last) {
				$result .= $repetitions . $last;
				$repetitions = 1;
			} else {
				$repetitions++;
			}

			$last = $number;
		}

		$result .= $repetitions . $last;

		return $result;
	}
}
