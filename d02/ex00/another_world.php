#!/usr/bin/php
<?php
    if ($argv[1])
    {
        $str = trim(preg_replace("( +)", " ", $argv[1]));
        echo trim((preg_replace("(\t+)", " ", $str))) . PHP_EOL;
    }
?>