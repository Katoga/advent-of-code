<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D02;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-02
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	private const TO_LOSE = 'X';
	private const TO_TIE = 'Y';
	private const TO_WIN = 'Z';

	private const POINTS = [
		self::ROCK_OPFOR . ' ' . self::TO_TIE => self::POINTS_TIE + self::POINTS_ROCK,
		self::ROCK_OPFOR . ' ' . self::TO_WIN => self::POINTS_WIN + self::POINTS_PAPER,
		self::ROCK_OPFOR . ' ' . self::TO_LOSE => self::POINTS_LOSE + self::POINTS_SCISSORS,
		self::PAPER_OPFOR . ' ' . self::TO_LOSE => self::POINTS_LOSE + self::POINTS_ROCK,
		self::PAPER_OPFOR . ' ' . self::TO_TIE => self::POINTS_TIE + self::POINTS_PAPER,
		self::PAPER_OPFOR . ' ' . self::TO_WIN => self::POINTS_WIN + self::POINTS_SCISSORS,
		self::SCISSORS_OPFOR . ' ' . self::TO_WIN => self::POINTS_WIN + self::POINTS_ROCK,
		self::SCISSORS_OPFOR . ' ' . self::TO_LOSE => self::POINTS_LOSE + self::POINTS_PAPER,
		self::SCISSORS_OPFOR . ' ' . self::TO_TIE => self::POINTS_TIE + self::POINTS_SCISSORS,
	];

	protected function getPointsForRound(string $round): int
	{
		return self::POINTS[$round];
	}
}
