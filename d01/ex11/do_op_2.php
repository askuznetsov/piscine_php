#! /usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = trim($argv[1]);
		$arr = str_split($str);
		$arr1 = array();
		$arr2 = array();
		$arr3 = array();
		$i = 0;
		$check = 0;
		$err = 0;
		foreach ($arr as $unit) {
			if ($i != 0 && ($unit == '-' || $unit == '+'  || $unit == '*'  || $unit == '/'  || $unit == '%' )) {
				if ($check) {
					$check = 2;
				}
				else {
					$check = 1;
				}
			}
			if ($check == 1) {
				$arr2[0] = $unit;
				$i = 0;
				$check = 2;
				$err++;
				if ($err > 1) {
					echo 'Syntax Error' . PHP_EOL;
					return (-42);
				}

			}
			else if ($check == 0) {
				$arr1[$i] = $unit;
				$i++;
			}
			else {
				$arr3[$i] = $unit;
				$i++;
			}
		}
		$neg_sign = 0;
		$pos_sign = 0;
		$ok = 0;
		foreach ($arr1 as $unit) {
		 	$arrstr1 .= $unit;
		 	if (ord($unit) == 45) {//ord — Конвертирует первый байт строки в число от 0 до 255.
		 		$neg_sign++;
		 	}
		 	if (ord($unit) == 43) {
		 		$pos_sign++;
		 	}
		 	if (is_numeric($unit)) {
		 		$ok++;
		 	}
		}
		if ($neg_sign > 1 || $pos_sign > 1) {
			return (-42);
		}
		$neg_sign = 0;
		$pos_sign = 0;
		$ok = 0;
		foreach ($arr2 as $unit) {
		 	$arrstr2 .= $unit;
		 	if (ord($unit) == 45) {
		 		$neg_sign++;
		 	}
		 	if (ord($unit) == 43) {
		 		$pos_sign++;
		 	}
		 	if (is_numeric($unit)) {
		 		$ok++;
		 	}
		}
		if ($neg_sign > 1 || $pos_sign > 1 || $neg_sign == 1 && $pos_sign == 1) {
			echo 'Syntax Error' . PHP_EOL;
			return (-42);
		}
		$neg_sign = 0;
		$pos_sign = 0;
		$ok = 0;
		foreach ($arr3 as $unit) {
		 	$arrstr3 .= $unit;
		 	if (ord($unit) == 45) {
		 		$neg_sign++;
		 	}
		 	if (ord($unit) == 43) {
		 		$pos_sign++;
		 	}
		 	if (is_numeric($unit)) {
		 		$ok++;
		 	}
		}
		if ($neg_sign > 1 || $pos_sign > 1) {
			echo 'Syntax Error' . PHP_EOL;
			return (-42);
		}
		if (!$arrstr3)
			$arrstr3 = '0';
		$arrstr1 = trim($arrstr1);
		$arrstr3 = trim($arrstr3);
		if (!is_numeric($arrstr1) || !is_numeric($arrstr3) || $arrstr3 == 0 || strstr($arrstr1, " ")) {
			echo "Syntax Error" . PHP_EOL;
		}
		else {
			if ($arrstr2 == '+')
            {
                echo $arrstr1 + $arrstr3 . PHP_EOL;
            
            }
            if ($arrstr2 == '-')
            {
                echo $arrstr1 - $arrstr3 . PHP_EOL;
                
            }
            if ($arrstr2 == '*')
            {
                echo $arrstr1 * $arrstr3 . PHP_EOL;
                
            }
            if ($arrstr2 == '/')
            {
                if ($arrstr3 == 0)
                {
                    echo 'Error' . PHP_EOL;
                    
                }
                echo $arrstr1 / $arrstr3 . PHP_EOL;
            }
            if ($arrstr2 == '%')
            {
                if ($arrstr3 == 0)
                {
                    echo 'Error' . PHP_EOL;
                    
                }
                echo $arrstr1 % $arrstr3 . PHP_EOL;
			}
		}
	}
	else
	{
		echo 'Error.' . PHP_EOL;
	}
?>