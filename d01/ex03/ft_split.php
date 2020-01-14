#! /usr/bin/php
<?php
    function ft_split($input) {
        $string = trim($input);
		$string = preg_replace("( +)", " ", $string);
		$arr = array();
		if ($string)
			$arr =  explode(' ', $string);//explode — Разбивает строку с помощью разделителя
		sort($arr);//sort — Сортирует массив. Функция сортирует массив. После завершения работы функции элементы массива будут расположены в порядке возрастания.
		return ($arr);
    }
?>