#!/usr/bin/php
<?php
if ($argv[2])
{
	$str = $argv;
	foreach ($str as $value)
	{
		if ($value == $str[0] || $value == $str[1])
			continue ;
		$unit = explode(":", $value);
		if (count($unit) > 2)
			$key[$unit[0]] = substr($value, strlen($unit[0]) + 1);
		else
			$key[$unit[0]] = $unit[1];
	}
	if ($key[$argv[1]])
		echo $key[$argv[1]]."\n";
}
?>
