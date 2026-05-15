<?php

define('DBHOST', 'localhost');
define('DBNAME', 'cafe418db');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBPORT', '3306');

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
