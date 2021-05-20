<?php

namespace core\base;

use Exception;

/**
 * Class View
 * @package core\base
 */
class View 
{

    /**
     * @var array
     */
    public $route = [];

    /**
     * @var string
     */
    public $view;

    /**
     * @var string
     */
    public $layout;

    /**
     * @var array
     */
    public $scripts = [];

    /**
     * @var array
     */
    public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    /**
     * View constructor.
     * @param $route
     * @param string $layout
     * @param string $view
     */
    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    /**
     * @param $buffer
     * @return null|string|string[]
     */
    protected function compressPage($buffer)
    {
        $search = [
            "/(\n)+/",
            "/\r\n+/",
            "/\n(\t)+/",
            "/\n(\ )+/",
            "/\>(\n)+</",
            "/\>\r\n</",
        ];
        $replace = [
            "\n",
            "\n",
            "\n",
            "\n",
            '><',
            '><',
        ];
        return preg_replace($search, $replace, $buffer);
    }

    /**
     * @param $vars
     * @throws Exception
     */
    public function render($vars)
    {
        $this->route['prefix'] = str_replace('\\', '/', $this->route['prefix']);

        if (is_array($vars)) extract($vars);
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start();
        {
            if (is_file($file_view)) {
                require $file_view;
            } else {
                throw new Exception("<p>View not found <b>$file_view</b></p>", 404);
            }

            $content = ob_get_contents();
        }
        ob_clean();

        if (false !== $this->layout) {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";

            if (is_file($file_layout)) {
                $content = $this->getScript($content);
                $scripts = [];

                if (!empty($this->scripts[0])) {
                    $scripts = $this->scripts[0];
                }
                require $file_layout;
            } else {
                throw new Exception("<p>Layout not found <b>$file_layout</b></p>", 404);
            }
        }
    }

    /**
     * @param $content
     * @return null|string|string[]
     */
    protected function getScript($content)
    {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);

        if (!empty($this->scripts)) {
            $content = preg_replace($pattern, '', $content);
        }

        return $content;
    }

    /**
     *
     */
    public static function getMeta()
    {
        echo '<title>' . self::$meta['title'] . '</title>
        <meta name="description" content="' . self::$meta['desc'] . '">
        <meta name="keywords" content="' . self::$meta['keywords'] . '">';
    }

    /**
     * @param string $title
     * @param string $desc
     * @param string $keywords
     */
    public static function setMeta($title = '', $desc = '', $keywords = '')
    {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }

    /**
     * @param $file
     */
    public function getPart($file)
    {
        $file = APP . "/views/{$file}.php";

        if (is_file($file)) {
            require_once $file;
        } else {
            echo "File {$file} not found...";
        }
    }
    
}