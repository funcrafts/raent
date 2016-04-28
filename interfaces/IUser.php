<?php
namespace funcraft\raent\interfaces;

/**
 * Interface IUser
 * @package funcraft\raent\interfaces
 * @author Funcraft <me@funcraft.ru>
 */
interface IUser
{
    /**
     * IUser constructor.
     * @param string $identity
     * @param string $secret
     */
    public function __construct($identity, $secret);

    /**
     * @return string
     */
    public function getIdentityPlease();

    /**
     * @return string
     */
    public function getSecretPlease();

    /**
     * @return ICreator
     */
    public function getCreatorPlease();

    /**
     * @return string
     */
    public static function generateSecret();
}