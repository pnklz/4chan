<?php
/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/
class MySql 
{
	var $Debug;
	function __construct($host, $user, $pass, $name)
	{
		# Enable debug if the person requests it
		if(isset($_GET['debug']))
		{
			$this->Debug = true;
		}
		# Connect to the MySql server
		$this->Debug("Connecting to MySql Server $host");
		$sql = @mysql_connect($host, $user, $pass) or $this->Error("Failed to connect to MySql Server!! -- " . mysql_error());
		
		# Select the DB
		$this->Debug("Selecting MySql DB $name");
		@mysql_select_db($name, $sql) or $this->Error("Could not select DB! -- " . mysql_error());
	}
	private function Error($msg)
	{
		# If we get an error show a message in debug and then a global message, then we kill the script.
		$this->Debug("Going Down!!");
		die("[Dead] " . $msg . "\n");
	}
	private function Debug($msg)
	{
		# Check if debug is enabled
		if($this->Debug === true)
		{
			# Since debug is enabled we echo the message
			echo "<div class=\"debug\">\n\n[Debug] " . $msg . "<br />\n\n</div>\n";
		}
	}
}
?>
