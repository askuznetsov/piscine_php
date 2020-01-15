#!/usr/bin/php
<?php
    if ($argc == 2)
	{
	$check = 0;
	$str = ucwords($argv[1]);//ucwords — Преобразует в верхний регистр первый символ каждого слова в строке.
	if (substr_count($str,' ') == 4)//substr_count — Возвращает число вхождений подстроки.
		$arr = explode(" ", "$str");
	else
	{
		echo "Wrong Format". PHP_EOL;
		exit(-42);
    }
    //init days and months
	$days = array(
		"Monday" => "Lundi",
		"Tuesday" => "Mardi",
		"Wednesday" => "Mercredi",
		"Thursday" => "Jeudi",
		"Friday" => "Vendredi",
		"Saturday" => "Samedi",
		"Sunday" => "Dimanche");
	$m = array(
		"1" => "Janvier",
		"2" => "Fevrier",
		"3" => "Mars",
		"4" => "Avril",
		"5" => "Mai",
		"6" => "Juin",
		"7" => "Juillet",
		"8" => "Aout",
		"9" => "Septembre",
		"10" => "Octobre",
		"11" => "Novembre",
        "12" => "Decembre");
    
    //going to validate
	if (in_array($arr[0], $days))
		$check += 1;
	if (preg_match("/^(([0-3]){1}([0-9]){1}|([1-9]){1})$/", $arr[1]) &&
		$arr[1] > 0 && $arr[1] < 32)
		$check += 1;
	if (in_array($arr[2], $m))
		$check += 1;
	if (preg_match("/^([0-9]){4}$/", $arr[3]) && $arr[3] > 1969)
		$check += 1;
	$time = explode(":", "$arr[4]");
	if (count($time) != 3)
	{
		echo "Wrong Format" . PHP_EOL;
		exit(-42);
	}
	if ((preg_match("/^([0-9]){2}$/", $time[0]) && $time[0] >= 0 && $time[0] < 24) &&
		(preg_match("/^([0-9]){2}$/", $time[1]) && $time[1] >= 0 && $time[1] < 60) &&
		(preg_match("/^([0-9]){2}$/", $time[2]) && $time[2] >= 0 && $time[2] < 60))
		$check += 1;
	if ($check != 5)
	{
		echo "Wrong Format" . PHP_EOL;
		exit(-42);
	}
	$julian_day = cal_to_jd(CAL_GREGORIAN, array_search($arr[2], $m),$arr[1],$arr[3]);//cal_to_jd ( int $calendar , int $month , int $day , int $year ) : int
                                                                                      //cal_to_jd() рассчитывает количество дней в юлианском календаре для даты в указанном календаре calendar.
	if (jddayofweek($julian_day,1) == array_search($arr[0], $days))//jddayofweek — Возвращает день недели. julian_day - день в виде числа в юлианском летоисчислении.
	{
		$stamp .= $arr[3].'-'.array_search($arr[2], $m).'-'.$arr[1].' '.$arr[4];
		$time_entered = strtotime($stamp);//strtotime — Преобразует текстовое представление даты на английском языке в метку времени Unix.
		$first_January = strtotime("1970-01-01 01:00:00");
		$diff = $time_entered-$first_January;
		echo "$diff" . PHP_EOL;
	}
	else
	{
		echo "Wrong Format" . PHP_EOL;
		exit(-42);
	}
}
?>