<?php

namespace App\Lib;


class StringHelper
{
    /**
     * Converted symbols «, », “ , ” to ", ` to '. Removing spaces and slashes
     *
     * @param $string
     *
     * @return string
     */
    public static function trimString($string)
    {
        $condition = [
            '«' => '"',
            '»' => '"',
            '“' => '"',
            '”' => '"',
            "`" => "'",
        ];
        $string=strtr($string,$condition);
        $string=addslashes(trim($string));

        return $string;
    }
}