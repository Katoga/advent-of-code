<?php
declare(strict_types=1);

namespace AdventOfCode\Command\Utils;

use AdventOfCode\Lib\Utils;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
#[AsCommand(
	name: 'utils:generator',
	description: 'Generates PHP code for new Day.',
)]
class Generator extends Command
{
	public const ARGUMENT_DESCRIPTION = 'description';
	public const ARGUMENT_YEAR = 'year';
	public const ARGUMENT_DAY = 'day';

	protected Utils\Generator $generator;

	/**
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->generator->generate();

		$output->writeln('Structure successfully created.');

		return Command::SUCCESS;
	}

	/**
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	protected function initialize(InputInterface $input, OutputInterface $output): void
	{
		$this->generator = new Utils\Generator(
			$input->getArgument(self::ARGUMENT_DESCRIPTION),
			$input->getArgument(self::ARGUMENT_YEAR),
			$input->getArgument(self::ARGUMENT_DAY)
		);
	}

	protected function configure(): void
	{
		$this
			->addArgument(self::ARGUMENT_DESCRIPTION, InputArgument::REQUIRED)
			->addArgument(self::ARGUMENT_DAY, InputArgument::OPTIONAL, 'Day', date('d'))
			->addArgument(self::ARGUMENT_YEAR, InputArgument::OPTIONAL, 'Year', date('Y'));
	}
}
