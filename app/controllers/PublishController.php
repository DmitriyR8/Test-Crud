<?php

namespace app\controllers;

use app\models\Publish;
use core\base\Controller;

/**
 * Class PublishController
 * @package app\controllers
 */
class PublishController extends Controller
{
    /**
     * @var
     */
    public $model;

    /**
     * PublishController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Publish();
    }

    /**
     *
     */
    public function indexAction()
    {
        $allPublish = $this->model->findAll();

        $this->set(compact(['allPublish']));
    }

    /**
     *
     */
    public function createPublishAction()
    {
        if ($_POST && $_POST['title']) {
            $title = $_POST['title'];
        }
        $this->set(compact(['title']));

        if (isset($_POST['submit']) && !empty($title)) {
            $createPublish = $this->model->create($title);
            header("Location: /publish");
            exit();
        }
    }

    /**
     *
     */
    public function readPublishAction()
    {
        if ($_GET && $_GET['publish']) {
            $publishId = $_GET['publish'];
        }

        $getPublishById = $this->model->findOne($publishId);

        $this->set(compact(['getPublishById']));
    }

    /**
     *
     */
    public function getUpdatePublishAction()
    {
        if ($_GET && $_GET['publish']) {
            $publishId = $_GET['publish'];
        }

        $getPublishById = $this->model->findOne($publishId);

        $this->set(compact(['getPublishById']));
    }

    /**
     *
     */
    public function postUpdatePublishAction()
    {
        if ($_POST && $_POST['id'] && $_POST['title']) {
            $id = $_POST['id'];
            $title = $_POST['title'];
        }

        if (!empty($title)) {
            $updatePublish = $this->model->update($id, $title);
        }

        header("Location: /readPublish?publish={$id}");
        exit();
    }

    /**
     *
     */
    public function deletePublishAction()
    {
        if ($_POST && $_POST['deletePublish']) {
            $id = $_POST['deletePublish'];
        }

        $deletePublish = $this->model->delete($id);

        header('Location: /publish');
        exit();
    }
}