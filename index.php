<?php
/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2019-05-21
 * Time: 13:35
 */

define('PATH', realpath('./'));
define('CORE', PATH . "/core");
define('APP', PATH . "/app");
define('MODULE',   "app");
define('DEBUG', true);

ini_set("display_errors", DEBUG ? 'On' : 'Off');

include CORE . '/common/function.php';
include CORE . '/core.php';

spl_autoload_register('\core\core::load');
\core\core::run();
