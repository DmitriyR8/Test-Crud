<?php

namespace core\base;

/**
 * Class Controller
 * @package core\base
 */
abstract class Controller 
{

    /**
     * @var array
     */
    public $route = [];

    /**
     * @var
     */
    public $view;

    /**
     * @var
     */
    public $layout;

    /**
     * @var array
     */
    public $vars = [];

    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    /**
     * @throws \Exception
     */
    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    /**
     * @param $vars
     */
    public function set($vars)
    {
        $this->vars = $vars;
    }
}
