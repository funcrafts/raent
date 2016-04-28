<?php
namespace funcraft\raent\interfaces;

/**
 * Interface IClient
 * @package funcraft\raent\interfaces
 * @author Funcraft <me@funcraft.ru>
 */
interface IClient extends IErrorable
{
    const ENTITY_CREATOR   = 'creator';
    const ENTITY_USER      = 'user';
    const ENTITY_SERVICE   = 'service';

    const ACTION_LIST = '';
    const ACTION_VIEW = '{id}';
    const ACTION_CREATE = '';
    const ACTION_UPDATE = '{id}';
    const ACTION_DELETE = '{id}';

    /**
     * @param string $token
     * @param string $secret
     * @return string
     */
    public static function authPlease($token, $secret);

    /**
     * @param string $identity
     * @param string $secret
     * @return IUser
     */
    public static function createUserPlease($identity, $secret);

    /**
     * @param string $identity
     * @param string $secret
     * @return bool
     */
    public static function deleteUserPlease($identity, $secret);
}