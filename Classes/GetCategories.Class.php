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
		$response = $db->query("SELECT * FROM categories ORDER BY id DESC;");
		$posts = array();
		while($row = mysql_fetch_array($response, MYSQL_ASSOC))
		{
			$posts[] = $row;
			unset($row);
		}
		return $posts;
	}
	static public function categoryExists($id)
	{
		global $db;
		$response = $db->query("SELECT * FROM categories WHERE id = '$id';");
		return (mysql_num_rows($response) == 1) ? true : false;
	}
	static public function nameForId($id) {
		global $db;
		$response = $db->query("SELECT name FROM categories WHERE id = '$id';");
		return mysql_result($response, 0, 0);
	}
}
?>
