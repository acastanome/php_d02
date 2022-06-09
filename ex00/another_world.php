#!/usr/bin/php
<?php
        if($argc > 1)
        {
            $string = trim(preg_replace('/\s+/', ' ', $argv[1]));
            $array=explode(' ',$string);
            $array=array_filter($array);
            $string=implode(' ',$array);
            echo $string."\n";
        }
?>