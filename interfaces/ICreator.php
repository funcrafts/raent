<?php
namespace funcraft\raent\interfaces;

/**
 * Interface ICreator
 * @package funcraft\raent\interfaces
 * @author Funcraft <me@funcraft.ru>
 */
interface ICreator extends IErrorable
{
    const PROPERTY_USERNAME     = 'username';
    const PROPERTY_LEVEL        = 'level';
    const PROPERTY_EXPERIENCE   = 'experience';
    const PROPERTY_ID           = 'id';
    const PROPERTY_ATTRIBUTE    = 'attribute';

    /**
     * @param string $username
     * @return $this
     */
    public function setUsernamePlease($username);

    /**
     * @return string
     */
    public function getUsernamePlease();

    /**
     * @param string $attributeName
     * @param mixed $value
     * @return bool
     */
    public function addAttributePlease($attributeName, $value);

    /**
     * @param string $attributeName
     * @param mixed $value
     * @param bool $createIfNotExist
     * @return $this
     */
    public function setAttributePlease($attributeName, $value, $createIfNotExist = false);

    /**
     * @param string $attributeName
     * @return mixed
     */
    public function getAttributePlease($attributeName);

    /**
     * @return int
     */
    public function getLevelPlease();

    /**
     * @return int
     */
    public function getExperiencePlease();

    /**
     * @param int $amount
     * @return bool
     */
    public function changeExpPlease($amount);

    /**
     * @param int $amount
     * @return bool
     */
    public function upExpPlease($amount);

    /**
     * @param int $amount
     * @return bool
     */
    public function downExpPlease($amount);

    /**
     * @return bool
     */
    public function deletePlease();
}