<?php
/**
 * This file is part of WebPhacilitator.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require_once dirname(__FILE__) . '/vendor/SplClassLoader.php';

$loader = new SplClassLoader('Yuyat_Phacilitator', dirname(__FILE__) . '/vendor/yuya-takeyama/phacilitator/src');
$loader->setNamespaceSeparator('_');
$loader->register();

$loader = new SplClassLoader('Yuyat_WebPhacilitator', dirname(__FILE__) . '/src');
$loader->setNamespaceSeparator('_');
$loader->register();

$loader = new SplClassLoader('Sumile', dirname(__FILE__) . '/vendor/yuya-takeyama/sumile/src');
$loader->setNamespaceSeparator('_');
$loader->register();

$loader = new SplClassLoader('Acne', dirname(__FILE__) . '/vendor/yuya-takeyama/acne/src');
$loader->setNamespaceSeparator('_');
$loader->register();

$loader = new SplClassLoader('Twig', dirname(__FILE__) . '/vendor/fabpot/twig/lib');
$loader->setNamespaceSeparator('_');
$loader->register();

$loader = new SplClassLoader('phpDataMapper', dirname(__FILE__) . '/vendor/vlucas');
$loader->setNamespaceSeparator('_');
$loader->register();

set_include_path(
    realpath(dirname(__FILE__) . '/vendor/codeguy/Slim') .
    PATH_SEPARATOR .
    get_include_path()
);
