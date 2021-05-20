<?php

namespace app\controllers;

use app\models\Author;
use app\models\Relation;
use core\base\Controller;

/**
 * Class AuthorsController
 * @package app\controllers
 */
class AuthorsController extends Controller
{
    /**
     * @var Author
     */
    public $author;

    /**
     * @var
     */
    public $relation;

    /**
     * AuthorsController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->author = new Author();
        $this->relation = new Relation();
    }

    /**
     *
     */
    public function indexAction()
    {
        $allAuthors = $this->relation->findAll();

        $this->set(compact(['allAuthors']));
    }

    /**
     *
     */
    public function createAuthorAction()
    {
        if ($_POST && $_POST['name'] && $_POST['publish'] && $_POST['book']) {
            $name = $_POST['name'];
            $publishId = $_POST['publish'];
            $bookId = $_POST['book'];
        }

        if (isset($_POST['submit']) && !empty($name) && !empty($publishId) && !empty($bookId)) {
           $createAuthor = $this->author->create($name);
           $createRelations = $this->relation->create($publishId, $bookId);

            header("Location: /authors");
            exit();
        }
    }

    /**
     *
     */
    public function readAuthorAction()
    {
        if ($_GET && $_GET['authors']) {
            $authorId = $_GET['authors'];
        }

        $getAuthorById = $this->relation->findOne($authorId);

        $this->set(compact(['getAuthorById']));
    }

    /**
     *
     */
    public function getUpdateAuthorAction()
    {
        if ($_GET && $_GET['authors']) {
            $authorId = $_GET['authors'];
        }

        $getAuthorById = $this->relation->getDataForUpdate($authorId);

        $this->set(compact(['getAuthorById']));
    }

    /**
     *
     */
    public function postUpdateAuthorAction()
    {
        if ($_POST && $_POST['id'] && $_POST['author_id'] && $_POST['author_name'] && $_POST['book_id'] && $_POST['publish_id']) {
            $id = $_POST['id'];
            $authorId = $_POST['author_id'];
            $author = $_POST['author_name'];
            $bookId = $_POST['book_id'];
            $publishId = $_POST['publish)id'];
        }

        if (!empty($author) && !empty($authorId) && !empty($publishId) && !empty($bookId)) {
            $updateAuthor = $this->author->update($author, $authorId);
            $updateRelation = $this->relation->update($id ,$publishId, $bookId);
        }

        header("Location: /readAuthor?author={$authorId}");
        exit();
    }

    /**
     *
     */
    public function deleteAuthorAction()
    {
        if ($_POST && $_POST['deleteAuthor']) {
            $id = $_POST['deleteAuthor'];
        }

        $deleteAuthor = $this->author->delete($id);

        header('Location: /authors');
        exit();
    }
}