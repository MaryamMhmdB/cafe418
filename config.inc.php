<?php

define('DBHOST', 'localhost');
define('DBNAME', 'CAFE418DB');
define('DBUSER', 'root');
define('DBPASS', '123123');
define('DBPORT', '3307');

define(
       'DBCONNSTRING',
       "mysql:host=" . DBHOST . ";port=" . DBPORT . ";dbname=" . DBNAME
);


try {
       $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
} catch (Throwable $e) {
       $code = $e->getCode();

       if ($code == 404) {
              http_response_code(404);
              include __DIR__ . '/404.html';
              exit;
       }

       if ($e instanceof PDOException) {
              http_response_code(500);
              include __DIR__ . '/pdo-error.html';
              exit;
       }
}
