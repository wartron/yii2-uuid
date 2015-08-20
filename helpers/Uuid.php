<?php

namespace wartron\yii2uuid\helpers;

use Yii;


class Uuid extends \yii\helpers\Inflector
{
    public static function str2uuid($s)
    {
        if(!$s) return null;
        if(strlen($s)==32)
            return hex2bin(strtoupper($s));
        return $s;
    }

    public static function uuid2str($u)
    {
        if(!$u) return null;
        if(strlen($u)==16)
            return strtoupper(bin2hex($u));
        return $u;
    }

}