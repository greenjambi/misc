<?php


function __autoload($className)
{
        if (strstr($className, 'Val_')) {
                require_once "lib/Val/".str_replace('Val_', '', $className).".class.php";
        } else {
                require_once(__DIR__."/$className.class.php");
        }
}

function d($strVal, $bolNewline=true)
{
  echo (($bolNewline)? "\n##" : '') . " $strVal";
}