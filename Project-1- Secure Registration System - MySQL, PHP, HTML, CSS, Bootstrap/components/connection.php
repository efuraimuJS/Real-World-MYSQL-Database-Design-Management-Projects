<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'efuraimujs');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'user_database');

/**
 * Attempt to connect to MariaDB database
 */

try {
    $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    die("ERROR: Could not connect. ".$e->getMessage());
}