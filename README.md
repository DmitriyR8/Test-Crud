<p align="center"><img src="https://iconscout.com/icon/php-99"></p>

## About Project

This is a test crud application with simple functionality. You can create, edit, view and delete posts directly in the application.

## How to run project

1. Создать бд под названием crud_db.
2. Импортировать дамп бд crud_db.sql.
3. Выполнить composer install.
4. Изменить настройки в config/db ('user' => 'username', 'pass' => 'password').
5. Открыть сайт по url localhost/books, если разворачивать под линукс то настраиваем виртуальный хост и открываем по url hostname/books.
6. Проект работает под сервером apache.   

## Notes

При создании и апдейте книг и авторов, привязка идет к id, поэтому в полях нужно указывать id сущностей, у которых есть привяка в базе данных.
