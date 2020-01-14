#! /usr/bin/php
<?php
    function ft_split($input) {
		$string = trim($input);
		$string = preg_replace("( +)", " ", $string);
		$arr = array();
		if ($string)
			$arr =  explode(' ', $string);
		return ($arr);
    }
    
    $rostring = ft_split($argv[1]);
    if (!($rostring) || $argc == 1)
        return ;
    for ($count = 1; $count < count($rostring); $count++)
        echo "$rostring[$count] ";

    echo $rostring[0];
?>