<?php

namespace Tests;

use Composer\Autoload\ClassLoader;

require_once __DIR__ . '/../vendor/autoload.php';
$loader = new ClassLoader();
$loader->add('tests', __DIR__ . '/..');
$loader->register();
