#! /usr/bin/php
<?php
    while (true) {
        echo "Enter a number: ";
		if (feof(STDIN)) {//Проверяет, достигнут ли конец файла.
			echo PHP_EOL;//Корректный символ конца строки, используемый на данной платформе.
			break ;
		}
		$string = fgets(STDIN);//Читает строку из файлового указателя.
		if (ctype_digit(trim($string))) {//ctype_digit - Проверяет, являются ли все символы в строке text цифровыми.
			if ($string % 2 == 0)
				echo "The number " . trim($string) . " is even\n";//trim — Удаляет пробелы (или другие символы) из начала и конца строки.
			else
				echo "The number " . trim($string) . " is odd\n";
		}
		else
            echo "'" . preg_replace("(\n+)", "", $string) ."' is not a number\n"; //preg_replace — Выполняет поиск и замену по регулярному выражению. Выполняет поиск совпадений в строке subject с шаблоном pattern и заменяет их на replacement.
                                                                                //Спецсимвол + - одно или более вхождений.
    }
?>