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
    
    function custom_sorting($s1, $s2){
		if ($s1 == $s2)
			return (0);
		$s1 = strtolower($s1);
		$s2 = strtolower($s2);
		for ($i = 0; $i < strlen($s1) & $i < strlen($s2); $i++) {
			$which_s1 = which_one($s1[$i]);
			$which_s2 = which_one($s2[$i]);
			if ($which_s1 == $which_s2)
				$sum = strcmp($s1[$i], $s2[$i]);
			else
				$sum = $which_s1 - $which_s2;
			if ($sum > 0)
				return (1);
			else if ($sum < 0)
                return (-1);
		}
		return (strcmp($s1, $s2));
    }
    
    function which_one($ch){
		if (ctype_alpha($ch))
			return (1);
		if (is_numeric($ch))
			return (2);
		else
			return (3);
    }
    
	function array_init($all_array)
	{
		$arr = array();
		for ($i = 0; $i < count($all_array); $i++) {
			$tmp = ft_split($all_array[$i]);
			$arr = array_merge($arr, $tmp);
		}
		return ($arr);
    }
	
	array_shift($argv);//array_shift — Извлекает первый элемент массива
	$all_array = array_init($argv);
	usort($all_array, "custom_sorting");//usort — Сортирует массив по значениям используя пользовательскую функцию для сравнения элементов
	for ($i = 0; $i < count($all_array); $i++) { 
		echo "$all_array[$i]". PHP_EOL;
	}
?>
