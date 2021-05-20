<?php

namespace core\base;

use core\Db;

/**
 * Class Model
 * @package core\base
 */
abstract class Model 
{
    /**
     * @var \core\Singleton
     */
    protected $pdo;

    /**
     * @var
     */
    protected $table;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function query($sql){
        return $this->pdo->execute($sql);
    }

    /**
     * @return mixed
     */
    public function countRows(){
        $sql = "SELECT COUNT(*) FROM {$this->table}";
        return $this->pdo->query($sql);
    }
}
