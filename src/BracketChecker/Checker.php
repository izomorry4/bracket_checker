<?php
namespace Izomorry4\BracketChecker;

use InvalidArgumentException;

class Checker
{
    const BRACKET_LIST = array("(",")");
    const ALLOW_LIST = array('\x0a','\x09','\x0d','\x20','\x28','\x29');

    /**
     * @param $str
     */
    private static function checkAllowList($str){
        $pattern = '/[^'.implode(self::ALLOW_LIST).']/';
        if(preg_match($pattern,$str))
            throw new InvalidArgumentException("Incorrect symbol in input string");
    }

    /**
     * @param string $str
     * @return bool
     */
    public static function IsCorrect(string $str){
        self::checkAllowList($str);
        $k = 0;
        for($i = 0;$i < strlen($str);$i++){
            if(in_array($str[$i],self::BRACKET_LIST))
                $k += $str[$i] == "(" ? 1 : -1;
        }
        return $k == 0;
    }
}
