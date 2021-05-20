<?php

namespace app\models;

use core\base\Model;

/**
 * Class Relation
 * @package app\models
 */
class Relation extends Model
{
    /**
     * @var string
     */
    protected $table = 'author_relations';

    /**
     * @var string
     */
    public $book = 'books';

    /**
     * @var string
     */
    public $author = 'authors';

    /**
     * @var string
     */
    public $publish = 'publish';

    /**
     * @return mixed
     */
    public function findAll()
    {
        $sql = "SELECT {$this->author}.id as author_id,
                {$this->author}.name as author_name,
                {$this->book}.id as book_id,
                {$this->book}.title as book_title,
                {$this->publish}.id as publish_id,
                {$this->publish}.title as publish_title
        FROM {$this->table}
        JOIN {$this->book} ON {$this->table}.book_id = {$this->book}.id
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id
        JOIN {$this->author} ON {$this->book}.author_id = {$this->author}.id";
        return $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        $sql = "SELECT {$this->author}.id as author_id,
                {$this->author}.name as author_name,
                {$this->book}.id as book_id,
                {$this->book}.title as book_title,
                {$this->publish}.id as publish_id,
                {$this->publish}.title as publish_title
        FROM {$this->table}
        JOIN {$this->book} ON {$this->table}.book_id = {$this->book}.id
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id
        JOIN {$this->author} ON {$this->book}.author_id = {$this->author}.id
        WHERE ({$this->author}.id) = {$id}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $publish
     * @param $book
     * @return mixed
     */
    public function create($publish, $book)
    {
        $sql = "INSERT INTO {$this->table}(publish_id, book_id) VALUES('$publish', '$book')";
        return $this->pdo->performQuery($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDataForUpdate($id)
    {
        $sql = "SELECT {$this->table}.id,
                {$this->author}.id as author_id,
                {$this->author}.name as author_name,
                {$this->book}.id as book_id,
                {$this->book}.title as book_title,
                {$this->publish}.id as publish_id,
                {$this->publish}.title as publish_title
        FROM {$this->table}
        JOIN {$this->book} ON {$this->table}.book_id = {$this->book}.id
        JOIN {$this->publish} ON {$this->table}.publish_id = {$this->publish}.id
        JOIN {$this->author} ON {$this->book}.author_id = {$this->author}.id
        WHERE ({$this->author}.id) = {$id}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @param $publishId
     * @param $bookId
     * @return mixed
     */
    public function update($id , $publishId, $bookId)
    {
        $sql = "UPDATE {$this->table} SET publish_id = '{$publishId}', book_id = '{$bookId}' WHERE (id) = {$id}";
        return $this->pdo->performQuery($sql);
    }
}