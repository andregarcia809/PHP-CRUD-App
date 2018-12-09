<?php

// Database Connection
function connectDB()
{
    try {
        $database = new PDO("mysql:host=ns6253.hostgator.com; dbname=andresga_Crud", "andresga_root1", "root1");
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<script>console.log('Connected to database')</script>";

        return $database;

    } catch (PDOException $e) {
        echo "<h4 style=' color: red;'>" . $e->getMessage() . "</h4>";
    }
}

$pdo = connectDB();

//Create users table if not exixstent
function initMigration($pdo)
{
    try {
        $statement = $pdo->prepare(
            'CREATE TABLE IF NOT EXISTS users (
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            first_name varchar(255) NOT NULL,
            last_name varchar(255) NOT NULL,
            age int NOT NULL
            );'
        );
        $statement->execute();
    } catch (PDOException $e) {
        echo "<h4 style=' color: red;'>" . $e->getMessage() . "</h4>";
    }
}