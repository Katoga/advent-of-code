<?php
declare(strict_types=1);

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */

if (@!include dirname(__DIR__) . '/vendor/autoload.php') {
	echo 'Install Nette Tester using `composer install`';
	exit(1);
}

Tester\Environment::setup();
