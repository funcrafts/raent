<?php
namespace funcraft\raent\components;

use funcraft\raent\interfaces\IClient;
use funcraft\raent\interfaces\ICreator;

/**
 * Class Creator
 * @package funcraft\raent\components
 * @author Funcraft <me@funcraft.ru>
 */
class Creator implements ICreator
{
    use ErrorableTrait;
    
    private $id = 0;
    protected $username = '';
    protected $level = 0;
    protected $experience = 0;
    protected $attributes = [];

    /**
     * @param string $username
     * @return $this
     */
    public function setUsernamePlease($username)
    {
        $this->username = $username;
        
        $this->requestRaent(
            IClient::ENTITY_CREATOR,
            IClient::ACTION_UPDATE,
            [
                self::PROPERTY_USERNAME => $this->username
            ]);
        
        return $this;
    }

    /**
     * @return string
     */
    public function getUsernamePlease()
    {
        return $this->username;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function changeExpPlease($amount)
    {
        $this->experience += $amount;

        $this->requestRaent(
            IClient::ENTITY_CREATOR,
            IClient::ACTION_UPDATE,
            [
                self::PROPERTY_EXPERIENCE => $this->experience
            ]);

        return $this;
    }

    /**
     * @param int $amount
     * @return Creator
     */
    public function downExpPlease($amount)
    {
        return $this->changeExpPlease(-$amount);
    }

    /**
     * @param int $amount
     * @return Creator
     */
    public function upExpPlease($amount)
    {
        return $this->changeExpPlease($amount);
    }

    /**
     * @param string $attributeName
     * @param mixed $value
     * @return $this
     */
    public function addAttributePlease($attributeName, $value)
    {
        $this->requestRaent(
            IClient::ENTITY_CREATOR,
            IClient::ACTION_UPDATE,
            [
                self::PROPERTY_ATTRIBUTE => $value
            ]
        );

        return $this;
    }

    /**
     * @param string $attribute
     * @return bool
     */
    protected function hasAttribute($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    /**
     * todo
     * @param string $attributeName
     * @param mixed $value
     * @param bool $createIfNotExist
     * @return $this
     */
    public function setAttributePlease($attributeName, $value, $createIfNotExist = false)
    {
        if($this->hasAttribute($attributeName)){
            $this->attributes[$attributeName] = $value;
        } elseif ($createIfNotExist){
            $this->requestRaent(
                IClient::ENTITY_CREATOR,
                IClient::ACTION_UPDATE,
                [
                    self::PROPERTY_ATTRIBUTE => $attributeName
                ]
            );
        }

        return $this;
    }

    /**
     * @param string $attributeName
     * @return mixed|null
     */
    public function getAttributePlease($attributeName)
    {
        return $this->hasAttribute($attributeName)
                ? $this->attributes[$attributeName]
                : null;
    }

    /**
     * @return int
     */
    public function getExperiencePlease()
    {
        return $this->experience;
    }

    /**
     * @return int
     */
    public function getLevelPlease()
    {
        return $this->level;
    }

    /**
     * @param string $entity
     * @param string $action
     * @param mixed $params
     * @return $this
     */
    private function requestRaent($entity, $action, $params)
    {
        return Client::getInstance()->getHttpClient()
                                    ->post($entity . '/' . $action, ['form_params' => $params]);
    }

    /**
     * @return $this
     */
    public function deletePlease()
    {
        $this->requestRaent(
            IClient::ENTITY_CREATOR,
            IClient::ACTION_DELETE,
            [
                self::PROPERTY_ID => $this->id
            ]);

        return $this;
    }
}