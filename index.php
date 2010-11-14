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
include_once dirname(__FILE__) . ("/Classes/Install.Class.php");

# Check if we're installed
if(!isset($host)) {
	$Install = new Install;
	if(isset($_GET['install']))
	{
		$pass = safe($_POST['pass']);
		if($pass == "SQL Pass")
		{
			$pass = '';
		}
		$Install->Generate(safe($_POST['host']), safe($_POST['user']), $pass, safe($_POST['name']));
		$Install->Done();
	}
	$Install->HTML();
	$Install->Done();
	die();
}
else

# HardCore Code
global $db;
$db = new MySql($user, $pass, $name, $host, 3306);

# General Functions

function safe($var)
{
	if(!@mysql_connect())
	{
		return addslashes($var);
	} 
	else
	{
		return mysql_escape_string($var);
	}
}
# Get Setting from DB
$settings = array();
function get_settings() {
	global $db;
	$settingResult = $db->query("SELECT * FROM settings;");
	while($setting = mysql_fetch_array($settingResult, MYSQL_ASSOC))
	{
		$settings[$setting['name']] = $setting['value'];
	}
	return true;
}
get_settings();
function settings($setting) {
	global $settings;
	return $settings[$setting];
}

# HTML & PHP Include
include_once dirname(__FILE__) . ("/Header.index.php");
include_once dirname(__FILE__) . ("/Main.index.php");
include_once dirname(__FILE__) . ("/Footer.index.php");
?>
