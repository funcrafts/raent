<?php
namespace funcraft\raent\components;

/**
 * Class ErrorableTrait
 * @package funcraft\raent\components
 * @author Funcraft <me@funcraft.ru>
 */
trait ErrorableTrait
{
    /**
     * @param bool $string
     * @return string|array
     */
    public static function getErrorsPlease($string = false)
    {
        return $string ? implode(self::$erros) : self::$errors;
    }
}