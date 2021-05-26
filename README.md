<p align="center"><img src="https://www.svgrepo.com/show/303208/php-1-logo.svg"></p>

## About Project

This is a test crud application with simple functionality. You can create, edit, view and delete posts directly in the application.

## How to run project

- Create a database with name "crud_db".
- Import dump of crud_db.sql database, it is in the root folder.
- Run ``` $ composer install ```.
- Change settings in config/db.php('user' => 'your_username', 'pass' => 'your_password').
- Open site at url http://localhost/books.

## Notes

- The project works with the apache server.
- When creating and updating books and authors, the binding goes to id, so in the fields you need to specify the id of entities that have a binding in the database.

## About the technologies used

- **[Apache Docs](https://httpd.apache.org/docs-project/)**
- **[PHP Docs](https://www.php.net/manual/en/)**
- **[MySQL Docs](https://dev.mysql.com/doc/refman/8.0/en/)**