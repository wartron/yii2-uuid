<?php

namespace wartron\yii2uuid\helpers;

use Rhumsaa\Uuid\Uuid as BaseUuid;


class Uuid extends BaseUuid
{

    public function bin($uuid)
    {
        return hex2bin(str_replace('-','', $uuid));
    }

    public static function str2uuid($s)
    {
        if(!$s) return null;
        if(strlen($s)==32)
            return hex2bin($s);
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