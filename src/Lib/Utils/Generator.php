<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Utils;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Generator
{
	protected string $namespaceCommand;
	protected string $pathCommand;
	protected string $namespaceLib;
	protected string $pathLib;

	public function __construct(protected string $description, protected string $year, protected string $day)
	{
		$this->namespaceCommand = sprintf('AdventOfCode\Command\Y%d\D%\'.02d', $this->year, $this->day);
		$this->pathCommand = sprintf('Command/Y%d/D%\'.02d', $this->year, $this->day);

		$this->namespaceLib = sprintf('AdventOfCode\Lib\Y%d\D%\'.02d', $this->year, $this->day);
		$this->pathLib = sprintf('Lib/Y%d/D%\'.02d', $this->year, $this->day);
	}

	public function generate(): void
	{
		$commandCommon = $this->generateCommandCommon();
		$commandPart1 = $this->generateCommandPart(Parts::One);
		$commandPart2 = $this->generateCommandPart(Parts::Two);

		$libCommon = $this->generateLibCommon();
		$libPart1 = $this->generateLibPart(Parts::One);
		$libPart2 = $this->generateLibPart(Parts::Two);

		$dir = sprintf(__DIR__ . '/../../%s/', $this->pathCommand);
		mkdir($dir, 0755, true);

		$fullPath = sprintf('%s/Common.php', $dir);
		if (file_put_contents($fullPath, $commandCommon) === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}
		$fullPath = sprintf('%s/Part1.php', $dir);
		if (file_put_contents($fullPath, $commandPart1) === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}

		$fullPath = sprintf('%s/Part2.php', $dir);
		if (file_put_contents($fullPath, $commandPart2) === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}

		$fullPath = sprintf('%s/input.txt', $dir);
		if (file_put_contents($fullPath, '') === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}

		$dir = sprintf(__DIR__ . '/../../%s/', $this->pathLib);
		mkdir($dir, 0755, true);

		$fullPath = sprintf('%s/Common.php', $dir);
		if (file_put_contents($fullPath, $libCommon) === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}
		$fullPath = sprintf('%s/Part1.php', $dir);
		if (file_put_contents($fullPath, $libPart1) === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}

		$fullPath = sprintf('%s/Part2.php', $dir);
		if (file_put_contents($fullPath, $libPart2) === false) {
			throw new RuntimeException(sprintf('Failed to write file "%s"', $fullPath));
		}
	}

	protected function generateCommandCommon(): PhpFile
	{
		$commandCommonsClass = 'AdventOfCode\Command\Commons';

		$className = 'Common';

		$file = $this->getSkeleton($this->namespaceCommand, $className);

		$namespace = $file->getNamespaces()[$this->namespaceCommand];
		$namespace->addUse($commandCommonsClass);

		/**
		 * @var ClassType $class
		 */
		$class = $namespace->getClasses()[$className];
		$class
			->setAbstract()
			->setExtends($commandCommonsClass)
			->addConstant('DESCRIPTION', $this->description);

		return $file;
	}

	protected function generateCommandPart(Parts $part): PhpFile
	{
		$className = sprintf('Part%d', $part->value);

		$file = $this->getSkeleton($this->namespaceCommand, $className);

		$namespace = $file->getNamespaces()[$this->namespaceCommand];

		/**
		 * @var ClassType $class
		 */
		$class = $namespace->getClasses()[$className];
		$class->addConstant('SOLUTION_MESSAGE', 'TODO');

		$class->setExtends(sprintf('%s\Common', $this->namespaceCommand));

		return $file;
	}

	protected function generateLibCommon(): PhpFile
	{
		$solverInterfaceClass = 'AdventOfCode\Lib\SolverInterface';

		$className = 'Common';

		$file = $this->getSkeleton($this->namespaceLib, $className);

		$namespace = $file->getNamespaces()[$this->namespaceLib];
		$namespace->addUse($solverInterfaceClass);

		/**
		 * @var ClassType $class
		 */
		$class = $namespace->getClasses()[$className];
		$class
			->setAbstract()
			->addImplement($solverInterfaceClass);

		return $file;
	}

	protected function generateLibPart(Parts $part): PhpFile
	{
		$className = sprintf('Part%d', $part->value);

		$file = $this->getSkeleton($this->namespaceLib, $className);

		$namespace = $file->getNamespaces()[$this->namespaceLib];
		$namespace->addUse('RuntimeException');

		/**
		 * @var ClassType $class
		 */
		$class = $namespace->getClasses()[$className];
		$class->setExtends(sprintf('%s\Common', $this->namespaceLib));

		$method = $class->addMethod('getSolution');
		$method
			->setPublic()
			->setReturnType('int')
			->setBody('throw new RuntimeException(\'Unimplemented.\');')
			->addParameter('input')
			->setType('string');

		return $file;
	}

	protected function getSkeleton(string $namespaceName, string $className): PhpFile
	{
		$namespace = new PhpNamespace($namespaceName);

		$class = new ClassType($className);
		$class
			->addComment('@author Katoga <katoga.cz@hotmail.com>')
			->addComment(sprintf('@since %s', date('Y-m-d')))
			->addComment('@license https://opensource.org/licenses/ISC ISC licence');

		$namespace->add($class);

		$file = new PhpFile();
		$file->setStrictTypes();
		$file->addNamespace($namespace);

		return $file;
	}
}
