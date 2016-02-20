<?php
/*
Plugin Name: WP Pesticide
Plugin URI:  https://github.com/jchck/wp-pesticide
Description: Quickly add Pesticide.css to your WordPress theme for faster CSS debugging
Version:     1.0
Author:      Justin Chick
Author URI:  http://jstn.ch/ck
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

/**
 *
 * Namespace our PHP file to avoid collisions
 * @link http://php.net/manual/en/language.namespaces.php
 *
 */
namespace jchck\pesticide;

/**
 *
 * Required functions are called below
 * @uses http://php.net/manual/en/function.require-once.php
 *
 */
require_once __DIR__ . '/lib/options.php';
require_once __DIR__ . '/lib/page.php';
require_once __DIR__ . '/lib/styles.php';