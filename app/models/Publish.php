<?php

namespace app\models;

use core\base\Model;

/**
 * Class Publish
 * @package app\models
 */
class Publish extends Model
{
    /**
     * @var string
     */
    protected $table = 'publish';

    /**
     * @return mixed
     */
    public function findAll(){
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC ";
        return $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id){
        $sql = "SELECT * FROM {$this->table} WHERE (id) = {$id}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $title
     * @return mixed
     */
    public function create($title)
    {
        $sql = "INSERT INTO {$this->table}(title) VALUES('$title')";
        return $this->pdo->performQuery($sql);
    }

    /**
     * @param $id
     * @param $title
     * @return mixed
     */
    public function update($id, $title)
    {
        $sql = "UPDATE {$this->table} SET title = '{$title}' WHERE (id) = {$id}";
        return $this->pdo->performQuery($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE (id) = {$id}";
        return $this->pdo->performQuery($sql);
    }
}