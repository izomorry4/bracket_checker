<?php
namespace Izomorry4\BracketChecker;

use Izomorry4\Exceptions;

class Checker
{
    const BRACKET_LIST = ["(",")"];
    const ALLOW_LIST = ['\x0a','\x09','\x0d','\x20','\x28','\x29'];

    /**
     * @param $str
     */
    private static function checkAllowList($str)
    {
        $pattern = '/[^'.implode(self::ALLOW_LIST).']/';
        if(preg_match($pattern,$str))
            throw new Exceptions\ArgumentException("Incorrect symbol in input string");
    }

    /**
     * @param string $str
     * @return bool
     */
    public static function IsCorrect(string $str)
    {
        self::checkAllowList($str);
        $k = 0;
        for($i = 0;$i < strlen($str);$i++){
            if(in_array($str[$i],self::BRACKET_LIST))
                $k += $str[$i] == "(" ? 1 : -1;
        }
        return $k == 0;
    }
}
