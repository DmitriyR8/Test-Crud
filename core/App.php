<?php

namespace core;

/**
 * Class App
 * @package core
 */
class App
{

    /**
     * @var Singleton
     */
    public static $app;

    /**
     * App constructor.
     */
    public function __construct() {
        session_start();
        self::$app = Registry::instance();
        new ErrorHandler();
    }

}
