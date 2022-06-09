#!/usr/bin/php
<?php
        if($argc > 1)
        {
            $string = $argv[1];
            $string = trim(preg_replace('/[ \t]+/', ' ', $string));
            echo $string."\n";
        }
?>