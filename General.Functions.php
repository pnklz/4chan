<?php
$settings = array();

$settingResult = $db->query("SELECT * FROM settings;");
while($setting = mysql_fetch_array($settingResult, MYSQL_ASSOC))
{
	$settings[$setting['name']] = $setting['value'];
}
	
function settings($setting) {
	global $settings;
	return $settings[$setting];
}

?>