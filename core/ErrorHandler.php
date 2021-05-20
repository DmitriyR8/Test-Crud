<?php

namespace core;

/**
 * Class ErrorHandler
 * @package core
 */
class ErrorHandler
{

    /**
     * ErrorHandler constructor.
     */
    public function __construct()
    {
        $this->getErrors();
    }

    public function getErrors()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     * @return bool
     */
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->logErrors($errstr, $errfile, $errline);

        if (DEBUG || in_array($errno, [E_USER_ERROR, E_RECOVERABLE_ERROR])) {
            $this->displayError($errno, $errstr, $errfile, $errline);
        }

        return true;
    }

    /**
     *
     */
    public function fatalErrorHandler()
    {
        $error = error_get_last();

        if (!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR) ) {
            $this->logErrors($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    /**
     * @param $e
     */
    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * @param string $message
     * @param string $file
     * @param string $line
     */
    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Error message: {$message} | File: {$file}, | Line: {$line}\n==========================\n", 3, ROOT . '/tmp/errors.log');
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     * @param int $response
     */
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);

        if ($response == 404 && !DEBUG) {
            require WWW .  '/errors/404.html';
            die;
        }
        if (DEBUG) {
            require WWW .  '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die;
    }
}