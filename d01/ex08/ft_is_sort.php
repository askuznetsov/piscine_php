#! /usr/bin/php
<?php
    function ft_is_sort($arr)
	{
		$simple_sort = $arr;
		$reverse = $arr;
		sort($simple_sort);
		rsort($reverse);//rsort — Сортирует массив в обратном порядке
		if ($simple_sort === $arr || $reverse === $arr)//TRUE если $a равно $b и имеет тот же тип.
			return (true);
		else
			return (false);
	}

?>