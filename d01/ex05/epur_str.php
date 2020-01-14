#! /usr/bin/php
<?php
    $string = preg_replace("( +)", " ", trim($argv[1]));
    if ($string)
        echo "$string", PHP_EOL;
?>