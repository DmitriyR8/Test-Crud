<?php

namespace core;

/**
 * Trait Singleton
 * @package core
 */
trait Singleton
{
    /**
     * @var
     */
    protected static $instance;

    /**
     * @return Singleton
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}
