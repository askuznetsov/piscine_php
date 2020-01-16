#!/usr/bin/php
<?php
	function title($str) {
            return substr($str[0], 0, stripos($str[0], "\"") + 1) . strtoupper(substr($str[0], stripos($str[0], "\"") + 1));
            //stripos — Возвращает позицию первого вхождения подстроки без учета регистра.
		}
	function ahrefupper($str) {
			$new = strtoupper($str[0]);
			return ($new);
		}
	function ahref($str) {
			$new = preg_replace_callback("/>(.*?)</s", "ahrefupper", $str[0]);
			return $new;
		}

	if ($argc != 2)
		exit(42);
    if (!file_exists($argv[1]))
    //file_exists — Проверяет существование указанного файла или каталога.
		exit(42);
	$patternt = "/title[ ]?=[ ]?\"(.*?)\"/s";
	$patterna = "/<a (.*?)<\/a>/s";
	echo preg_replace_callback($patterna, "ahref", preg_replace_callback($patternt, "title", file_get_contents($argv[1])));
?>
