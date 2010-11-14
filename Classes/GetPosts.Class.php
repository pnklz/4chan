<?php
/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/
class GetPosts
{
	private $category_id;
	function __construct($category_id)
	{
		$this->category_id = $category_id;
	}
	function __destruct()
	{
		
	}
	public function getPosts($amount, $page) // TODO: page #
	{
		global $db;
		$response = $db->query("SELECT * posts WHERE category_id = '$this->category_id' ORDER BY id DESC LIMIT $amount;");
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