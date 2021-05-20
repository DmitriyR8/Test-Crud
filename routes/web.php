<?php

use core\Router;

Router::add('^books$', ['controller' => 'Books', 'action' => 'index']);
Router::add('^readBook$', ['controller' => 'Books', 'action' => 'readBook']);
Router::add('^createBook$', ['controller' => 'Books', 'action' => 'createBook']);
Router::add('^getUpdateBook$', ['controller' => 'Books', 'action' => 'getUpdateBook']);
Router::add('^postUpdateBook$', ['controller' => 'Books', 'action' => 'postUpdateBook']);
Router::add('^deleteBook$', ['controller' => 'Books', 'action' => 'deleteBook']);

Router::add('^publish$', ['controller' => 'Publish', 'action' => 'index']);
Router::add('^readPublish$', ['controller' => 'Publish', 'action' => 'readPublish']);
Router::add('^createPublish$', ['controller' => 'Publish', 'action' => 'createPublish']);
Router::add('^getUpdatePublish$', ['controller' => 'Publish', 'action' => 'getUpdatePublish']);
Router::add('^postUpdatePublish$', ['controller' => 'Publish', 'action' => 'postUpdatePublish']);
Router::add('^deletePublish$', ['controller' => 'Publish', 'action' => 'deletePublish']);

Router::add('^authors$', ['controller' => 'Authors', 'action' => 'index']);
Router::add('^readAuthor$', ['controller' => 'Authors', 'action' => 'readAuthor']);
Router::add('^createAuthor$', ['controller' => 'Authors', 'action' => 'createAuthor']);
Router::add('^getUpdateAuthor$', ['controller' => 'Authors', 'action' => 'getUpdateAuthor']);
Router::add('^postUpdateAuthor$', ['controller' => 'Authors', 'action' => 'postUpdateAuthor']);
Router::add('^deleteAuthor$', ['controller' => 'Authors', 'action' => 'deleteAuthor']);







