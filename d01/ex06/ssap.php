#! /usr/bin/php
<?php
    function ft_split($input) {
		$string = trim($input);
		$string = preg_replace("( +)", " ", $string);
		$arr = array();
		if ($string)
			$arr =  explode(' ', $string);
		sort($arr);
		return ($arr);
    }
    
	$arr = array();
	for ($count = 1; $count < $argc; $count++) {
		$split = ft_split($argv[$count]);
		foreach ($split as $unit) {
			array_push($arr, $unit);
		}
	}
	sort($arr, SORT_STRING);//SORT_STRING - строковое сравнение элементов
	foreach ($arr as $string) {
		echo "$string" . PHP_EOL;
	}
?>