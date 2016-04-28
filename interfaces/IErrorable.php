<?php
namespace funcraft\raent\interfaces;

/**
 * Interface IErrorable
 * @package funcraft\raent\interfaces
 * @author Funcraft <me@funcraft.ru>
 */
interface IErrorable
{
    /**
     * @param bool $asString return as a string
     * @return string|array
     */
    public static function getErrorsPlease($asString);
}