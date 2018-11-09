<?php

/**
 * Plugin Name: Reed Jobs
 * Author:      William Roberts
 * Description: This is my test plugin for the dev branch
 * Version: 0.1.1
 * Text Domain: clarke_twitter
 */

use Dhii\Cache\MemoryMemoizer;
use Dhii\Di\CachingContainer;
use Develon674\ReedJobs\Init;

require_once("vendor/autoload.php"); // Requiring composer autoload

$services = require("services.php");

$cache = new MemoryMemoizer();

$plugin_file = __FILE__;
$plugin_dir = dirname($plugin_file);

$container = new CachingContainer($services($plugin_dir, plugins_url('', $plugin_file)), $cache);

$init = new Init($container);
$init->run();

?>
