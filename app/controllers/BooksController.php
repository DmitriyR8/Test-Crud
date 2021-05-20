<?php

namespace app\controllers;

use app\models\Book;
use core\base\Controller;

/**
 * Class BooksController
 * @package app\controllers
 */
class BooksController extends Controller
{
    /**
     * @var Book
     */
    public $model;

    /**
     * BooksController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Book();
    }

    /**
     *
     */
    public function indexAction()
    {
        $allBooks = $this->model->findAll();

        $this->set(compact(['allBooks']));
    }

    /**
     *
     */
    public function createBookAction()
    {
        if ($_POST && $_POST['title'] && $_POST['publish'] && $_POST['author']) {
            $title = $_POST['title'];
            $publishId = $_POST['publish'];
            $authorId = $_POST['author'];
        }

        if (isset($_POST['submit']) && !empty($title) && !empty($publishId) && !empty($authorId)) {
            $getRelation = $this->model->getDataForCreate($publishId, $authorId);
            if ($getRelation) {
                foreach ($getRelation as $item) {
                    $createBook = $this->model->create($title, $item['publish'], $item['author']);
                }
            } else {
                $createBook = $this->model->create($title, $publishId, $authorId);
            }

            header("Location: /books");
            exit();
        }
    }

    /**
     *
     */
    public function readBookAction()
    {
        if ($_GET && $_GET['books']) {
            $bookId = $_GET['books'];
        }

        $getBookById = $this->model->findOne($bookId);

        $this->set(compact(['getBookById']));
    }

    /**
     *
     */
    public function getUpdateBookAction()
    {
        if ($_GET && $_GET['books']) {
            $bookId = $_GET['books'];
        }

        $getBookById = $this->model->getDataForUpdate($bookId);

        $this->set(compact(['getBookById']));
    }

    /**
     *
     */
    public function postUpdateBookAction()
    {
        if ($_POST && $_POST['id'] && $_POST['book'] && $_POST['publish'] && $_POST['author']) {
            $id = $_POST['id'];
            $title = $_POST['book'];
            $publishId = $_POST['publish'];
            $authorId = $_POST['author'];
        }

        if (!empty($title) && !empty($publishId) && !empty($authorId)) {
            $updateBook = $this->model->update($id, $title, $publishId, $authorId);
        }

        header("Location: /readBook?book={$id}");
        exit();
    }

    /**
     *
     */
    public function deleteBookAction()
    {
        if ($_POST && $_POST['deleteBook']) {
            $id = $_POST['deleteBook'];
        }

        $deleteBook = $this->model->delete($id);

        header('Location: /books');
        exit();
    }
}