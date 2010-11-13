<?php
/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/
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
?>
