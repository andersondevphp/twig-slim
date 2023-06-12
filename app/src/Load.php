<?php

namespace app\src;

class load
{
    public static function file($file)
    {
        $file = path().$file;
        if(!file_exists($file)) {
            throw new \Exception("Este arquivo não existe: {$file}");
        }
        return require $file;
    }
}