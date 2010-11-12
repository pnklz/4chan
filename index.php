<?php
/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/
error_reporting(E_ALL);
# Config
include_once dirname(__FILE__) . ("/Config.php");

# Classes
include_once dirname(__FILE__) . ("/Classes/Mysql.Class.php");

# HardCore Code
$db = new MySql($host, $user, $pass, $name);

# HTML
include_once dirname(__FILE__) . ("/Header.index.php");
include_once dirname(__FILE__) . ("/Main.index.php");
include_once dirname(__FILE__) . ("/Footer.index.php");
?>