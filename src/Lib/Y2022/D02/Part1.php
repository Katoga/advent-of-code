<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D02;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-02
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	private const ROCK_ME = 'X';
	private const PAPER_ME = 'Y';
	private const SCISSORS_ME = 'Z';

	private const POINTS = [
		self::ROCK_OPFOR . ' ' . self::ROCK_ME => self::POINTS_TIE + self::POINTS_ROCK,
		self::ROCK_OPFOR . ' ' . self::PAPER_ME => self::POINTS_WIN + self::POINTS_PAPER,
		self::ROCK_OPFOR . ' ' . self::SCISSORS_ME => self::POINTS_LOSE + self::POINTS_SCISSORS,
		self::PAPER_OPFOR . ' ' . self::ROCK_ME => self::POINTS_LOSE + self::POINTS_ROCK,
		self::PAPER_OPFOR . ' ' . self::PAPER_ME => self::POINTS_TIE + self::POINTS_PAPER,
		self::PAPER_OPFOR . ' ' . self::SCISSORS_ME => self::POINTS_WIN + self::POINTS_SCISSORS,
		self::SCISSORS_OPFOR . ' ' . self::ROCK_ME => self::POINTS_WIN + self::POINTS_ROCK,
		self::SCISSORS_OPFOR . ' ' . self::PAPER_ME => self::POINTS_LOSE + self::POINTS_PAPER,
		self::SCISSORS_OPFOR . ' ' . self::SCISSORS_ME => self::POINTS_TIE + self::POINTS_SCISSORS,
	];

	protected function getPointsForRound(string $round): int
	{
		return self::POINTS[$round];
	}
}
