<?php

namespace app\models;

use core\base\Model;

/**
 * Class Book
 * @package app\models
 */
class Book extends Model
{
    /**
     * @var string
     */
    protected $table = 'books';
    /**
     * @var string
     */
    protected $author = 'authors';
    /**
     * @var string
     */
    protected $publish = 'publish';

    /**
     * @return mixed
     */
    public function findAll()
    {
        $sql = "SELECT 
                {$this->table}.id as id, 
                {$this->table}.title as book, 
                {$this->publish}.title as publish, 
                {$this->author}.name as author 
        FROM {$this->table}
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id
        JOIN {$this->author} ON {$this->table}.author_id = {$this->author}.id";
        return $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        $sql = "SELECT 
                {$this->table}.id as id, 
                {$this->table}.title as book, 
                {$this->publish}.title as publish, 
                {$this->author}.name as author 
        FROM {$this->table}
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id
        JOIN {$this->author} ON {$this->table}.author_id = {$this->author}.id
        WHERE ({$this->table}.id) = {$id}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $publishId
     * @param $authorId
     * @return mixed
     */
    public function getDataForCreate($publishId, $authorId)
    {
        $sql = "SELECT  {$this->publish}.id as publish, 
                {$this->author}.id as author FROM books
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id 
        JOIN {$this->author} ON {$this->table}.author_id = {$this->author}.id
        WHERE books.publish_id = {$publishId} AND books.author_id = {$authorId}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $title
     * @param $publishId
     * @param $authorId
     * @return mixed
     */
    public function create($title, $publishId, $authorId)
    {
        $sql = "INSERT INTO {$this->table} (title, publish_id, author_id) VALUES ('$title' ,'$publishId', '$authorId')";
        return $this->pdo->performQuery($sql);
    }

    public function getDataForUpdate($id)
    {
        $sql = "SELECT 
                {$this->table}.id as id, 
                {$this->table}.title as book, 
                {$this->publish}.id as publish, 
                {$this->author}.id as author 
        FROM {$this->table}
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id
        JOIN {$this->author} ON {$this->table}.author_id = {$this->author}.id
        WHERE ({$this->table}.id) = {$id}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $title
     * @param $publish
     * @param $author
     * @param $id
     * @return mixed
     */
    public function update($id, $title, $publish, $author)
    {
        $sql = "UPDATE {$this->table} SET title = '{$title}', publish_id = '{$publish}', author_id = '{$author}' WHERE (id) = {$id}";
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