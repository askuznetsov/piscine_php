#! /usr/bin/php
<?php
    if ($argc == 1)
        return ;
    foreach ($argv as $key => $value) {//key() возвращает индекс текущего элемента массива. 
        if ($key != 0)
            echo "$value", PHP_EOL;
    }
?>