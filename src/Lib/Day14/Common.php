<?php
namespace AdventOfCode\Lib\Day14;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-15
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{

	/**
	 *
	 * @var string
	 */
	protected $pattern = '~^(?<name>[A-Z][a-z]+) can fly (?<speed>\d+) km/s for (?<endurance>\d+) seconds, but then must rest for (?<resting>\d+) seconds.$~';

	/**
	 *
	 * @var int
	 */
	protected $seconds;

	/**
	 *
	 * @var array
	 */
	protected $params = [];

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$solution = 0;

		$deers = explode(PHP_EOL, $input);

		foreach ($deers as $deer) {
			$this->parseDeerParams($deer);
		}

		$totalDistance = [];
		foreach ($this->params as $deerName => $deerParams) {
			$fullCycleDuration = $deerParams['endurance'] + $deerParams['resting'];
			$fullCycles = floor($this->seconds / $fullCycleDuration);
			$lastCycleDuration = $this->seconds - ($fullCycles * $fullCycleDuration);

			$lastCycleRunningTime = min([$deerParams['endurance'], $lastCycleDuration]);
			$lastCycleDistance = $deerParams['speed'] * $lastCycleRunningTime;

			$fullCyclesDistance = $fullCycles * $deerParams['speed'] * $deerParams['endurance'];
			$totalDistance[$deerName] = $fullCyclesDistance + $lastCycleDistance;
		}

		return (int) max($totalDistance);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Day10\SolverInterface::setIterations()
	 */
	public function setDuration($seconds)
	{
		$this->seconds = $seconds;
	}

	/**
	 *
	 * @param string $deer
	 */
	protected function parseDeerParams($deer)
	{
		$matches = [];
		if (preg_match($this->pattern, $deer, $matches) === 1) {
			$this->params[$matches['name']] = [
				'speed' => $matches['speed'],
				'endurance' => $matches['endurance'],
				'resting' => $matches['resting']
			];
		}
	}
}
