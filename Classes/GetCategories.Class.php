<?php
/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/
class GetCategories
{
	function __construct()
	{

	}
	function __destruct()
	{
		
	}
	public function getCategories()
	{
		global $db;
		$response = $db->query("SELECT * categories ORDER BY id DESC;");
		$posts = array();
		while($row = mysql_fetch_array($response, MYSQL_ASSOC))
		{
			$posts[] = $row;
			unset($row);
		}
		return $posts;
	}
}
?>