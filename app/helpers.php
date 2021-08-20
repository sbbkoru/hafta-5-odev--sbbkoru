<?php

function statusCSS($status)
{
    $arr_ = [
        'a' => 'success',
        'p' => 'danger',
        't' => 'warning'
    ];

    return $arr_[$status];
}


function getR($obj_, $obj, $prop)
{

    if ($obj === TRUE) {
        foreach ($obj_ as $key => $val_) {
            $arr_[$key] = $val_[$prop];
        }
        return $arr_;
    }

    if ($prop === TRUE && $obj_[$obj]) {
        return $obj_[$obj];
    }

    return isset($obj_[$obj][$prop]) ? $obj_[$obj][$prop] :  $obj;
}


function decodeX($value)
{
    return explode("|", substr($value, 1, -1));
}

function encodeX($value)
{
    $value = (array) $value;

    if (count($value) == 0 || !$value) {
        $string =  null;
    } else {
        $string = "|" . implode("|", $value) . "|";
    }

    return $string;
}
