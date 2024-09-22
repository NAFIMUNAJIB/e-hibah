<?php

if (! function_exists('idrFormat'))
{
    function idrFormat($nominal)
    {
        $value = number_format($nominal,0,',',',');;
        return $value;
    }
}
