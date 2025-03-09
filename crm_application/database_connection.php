<?php

    // Directive for dotenv
    use Dotenv\Dotenv;

    require 'vendor/autoload.php';

    // Load environment variables from .env file
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Define the database connection constants here!
    define('DB_HOST', $_ENV['DB_HOST']);
    define('DB_USER', $_ENV['DB_USER']);     // your scweb username
    define('DB_PASSWORD', $_ENV['DB_PASSWORD']);  // See blackboard for 20-char password
    define('DB_NAME', $_ENV['DB_NAME']);   // username followed by lowercase db
    define('DB_PORT', $_ENV['DB_PORT']);

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    if ($connection -> connect_error) {
        die("Connection failed! " . $connection->connect_error);
    }

    // echo "Connection successful!" . PHP_EOL;
?>