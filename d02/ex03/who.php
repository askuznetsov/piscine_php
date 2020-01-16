#!/usr/bin/php
<?php
	$fd = fopen("/var/run/utmpx", 'r');
	date_default_timezone_set("Europe/Kiev");
	while ($str = fread($fd, 628)) {
        $unit = unpack("a256user/a4id/a32line/ipid/itype/Itime", $str);
        //unpack — Распаковать данные из бинарной строки.
		if ($unit[type] == 7) {
			echo "$unit[user] $unit[line]  ". date('M  j H:i', $unit[time])."\n";
		}
	}
?>
