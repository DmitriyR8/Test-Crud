<?php

namespace app\models;

use core\base\Model;

/**
 * Class Author
 * @package app\models
 */
class Author extends Model
{
    /**
     * @var string
     */
    protected $table = 'authors';

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE (id) = {$id}";
        return $this->pdo->performQuery($sql);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function create($name)
    {
        $sql = "INSERT INTO {$this->table}(name) VALUES('$name')";
        return $this->pdo->performQuery($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE (id) = {$id}";
        return $this->pdo->query($sql);
    }

    public function update($author, $id)
    {
        $sql = "UPDATE {$this->table} SET name = '{$author}' WHERE (id) = {$id}";
        return $this->pdo->performQuery($sql);
    }
}