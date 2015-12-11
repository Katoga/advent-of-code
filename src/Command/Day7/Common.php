<?php
namespace AdventOfCode\Command\Day7;

use AdventOfCode\Command\Commons;
use AdventOfCode\Lib\Day7\SolverInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common extends Commons
{
	const DESCRIPTION = 'Some Assembly Required';

	const SOLUTION_MESSAGE = 'Signal on wire "%s"';

	const OPTION_OUTPUT_WIRE_NAME = 'output-wire';

	const OPTION_OUTPUT_WIRE_SHORT = 'o';

	const DEFAULT_OUTPUT_WIRE = 'a';

	/**
	 *
	 * @var SolverInterface
	 */
	protected $solver;

	/**
	 *
	 * @var string
	 */
	protected $outputWire;

	/**
	 *
	 * @param SolverInterface $solver
	 */
	public function __construct(SolverInterface $solver)
	{
		parent::__construct($solver);
	}

	protected function configure()
	{
		parent::configure();

		$this->addOption(
			static::OPTION_OUTPUT_WIRE_NAME,
			static::OPTION_OUTPUT_WIRE_SHORT,
			InputOption::VALUE_REQUIRED,
			'Output wire',
			static::DEFAULT_OUTPUT_WIRE
		);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::initialize()
	 */
	protected function initialize(InputInterface $input, OutputInterface $output)
	{
		parent::initialize($input, $output);

		$this->outputWire = $input->getOption(static::OPTION_OUTPUT_WIRE_NAME);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::getSolution()
	 */
	protected function getSolution()
	{
		$this->solver->setOutputWire($this->outputWire);

		return parent::getSolution();
	}
}