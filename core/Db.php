<?php

namespace core;

use Exception;
use PDO;

/**
 * Class Db
 * @package core
 */
class Db
{
    use Singleton;

    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * Db constructor.
     * @throws Exception
     */
    protected function __construct()
    {
        $db = require_once CONF .'/db.php';

        $this->pdo = new PDO($db['dsn'], $db['user'], $db['pass']);

        if (!$this->pdo) {
            throw new Exception("No database connection", 500);
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }

    /**
     * @param $sql
     * @return bool
     */
    public function performQuery($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }
}
