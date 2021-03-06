<?php

namespace core;

/**
 * Class Registry
 * @package core
 */
class Registry
{
    use Singleton;

    /**
     * @var array
     */
    protected static $properties = [];

    /**
     * @param $name
     * @param $value
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return self::$properties;
    }

}
