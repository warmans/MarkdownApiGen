<?php
define('DS', DIRECTORY_SEPARATOR);
define('LIBRARY_ROOT', realpath('..'.DS.'src'));
define('RESOURCES', realpath('.'.DS.'resources'));

require_once(RESOURCES.DS.'SplClassLoader.php');

//core lib
$loader = new \Core\SplClassLoader('MarkdownApiGen', LIBRARY_ROOT);
$loader->register();