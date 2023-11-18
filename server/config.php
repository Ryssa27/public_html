<?php

require_once realpath(__DIR__ ."/vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$host = $_ENV['MYSQL_HOST'];/*"localhost"; /* Host name */
$user = $_ENV['MYSQL_USER']; /* User */
$password = $_ENV['MYSQL_PASSWORD']; /* Password */
$dbname = $_ENV['MYSQL_DATABASE']; /* Database name */
$con = mysqli_connect($host, $user, $password, $dbname);

$con->query('set character_set_client=utf8');
$con->query('set character_set_connection=utf8');
$con->query('set character_set_results=utf8');
$con->query('set character_set_server=utf8');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}