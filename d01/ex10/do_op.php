#! /usr/bin/php
<?php
    $argv[1] = trim($argv[1]);
    $argv[2] = trim($argv[2]);
    $argv[3] = trim($argv[3]);


    if ($argc > 1 && $argc < 5) {
		if (is_numeric($argv[1]) && is_numeric($argv[3])) {
            if ($argv[2] == '+')
            {
                echo $argv[1] + $argv[3] . PHP_EOL;
            
            }
            if ($argv[2] == '-')
            {
                echo $argv[1] - $argv[3] . PHP_EOL;
                
            }
            if ($argv[2] == '*')
            {
                echo $argv[1] * $argv[3] . PHP_EOL;
                
            }
            if ($argv[2] == '/')
            {
                if ($argv[3] == 0)
                {
                    echo 'Error' . PHP_EOL;
                    
                }
                echo $argv[1] / $argv[3] . PHP_EOL;
                
            }
            if ($argv[2] == '%')
            {
                if ($argv[3] == 0)
                {
                    echo 'Error' . PHP_EOL;
                    
                }
                echo $argv[1] % $argv[3] . PHP_EOL;
                
            }
		}
		else {
			echo 'Error.' . PHP_EOL;
		}
	}
	else {
		echo 'Error.' . PHP_EOL;
	}
?>