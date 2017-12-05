<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day9;

use AdventOfCode\Lib\SolverInterface;

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
	 * @var array
	 */
	protected $distances = [];

	/**
	 *
	 * @var array
	 */
	protected $locations = [];

	/**
	 * @var array
	 */
	protected $permutations = [];

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$routes = explode(PHP_EOL, $input);

		foreach ($routes as $route) {
			$route = trim($route);
			if (!empty($route)) {
				$this->parseRoute($route);
			}
		}

		$distances = $this->getDistances();

		return $this->getResult($distances);
	}

	/**
	 *
	 * @param string $route
	 * @throws \RuntimeException
	 */
	protected function parseRoute(string $route): void
	{
		$matches = [];
		if (preg_match('~^(?<loc1>[a-zA-Z]+) to (?<loc2>[a-zA-Z]+) = (?<distance>\d+)$~', $route, $matches) !== 1) {
			throw new \RuntimeException(sprintf('Failed to parse route "%s"', $route));
		}

		// record all locations
		$this->locations[$matches['loc1']] = true;
		$this->locations[$matches['loc2']] = true;

		// record two locations distance
		$connection = [
			$matches['loc1'],
			$matches['loc2']
		];
		sort($connection);

		$this->distances[implode(' ', $connection)] = $matches['distance'];
	}

	/**
	 *
	 * @param array $items
	 * @param array $perms
	 * @return array
	 */
	protected function getPaths(array $items, array $perms = []): array
	{
		if (empty($items)) {
			$this->permutations[] = $perms;
		} else {
			for ($i = count($items) - 1; $i >= 0; $i--) {
				$newitems = $items;
				$newperms = $perms;
				list($foo) = array_splice($newitems, $i, 1);
				array_unshift($newperms, $foo);
				$this->getPaths($newitems, $newperms);
			}
		}

		return $this->permutations;
	}

	/**
	 *
	 * @return array
	 */
	protected function getDistances(): array
	{
		$paths = $this->getPaths(array_keys($this->locations));

		$distances = [];

		foreach ($paths as $path) {
			$distance = 0;
			$stepsCnt = count($path) - 1;

			foreach ($path as $i => $startLocation) {
				if ($i < $stepsCnt) {
					$endLocation = $path[$i + 1];
					$step = [
						$startLocation,
						$endLocation
					];
					sort($step);

					$distanceKey = sprintf('%s %s', $step[0], $step[1]);
					$distance += $this->distances[$distanceKey];
				}
			}
			$distances[] = $distance;
		}

		return $distances;
	}

	/**
	 *
	 * @param array $distances
	 * @return int
	 */
	abstract protected function getResult(array $distances): int;
}
