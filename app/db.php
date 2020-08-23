<?php
error_reporting (E_NOTICE);
define('DB_SERVER', 'localhost');
define('DB_USER', 'mysql');
define('DB_PASS', 'mysql');
define('DB_NAME', 'taskfeed');

function getConnection() //функция подключается к базе
{
    static $connection;
    if ($connection === NULL) {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
        or die("Ошибка " . mysqli_error($connection));
    }
    return ($connection);
}

function createTable($connect) {
    $query ="CREATE TABLE IF NOT EXISTS feedback
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    text TEXT NOT NULL,
    date DATE NOT NULL 
)";
    $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
    return $result;
}


function setFeedBack($name, $email, $text) //записывает сообщение в базу данных
{
    $connect= getConnection();
    $date = date('d.m.Y');
    $result = mysqli_query(
        $connect ,
        "INSERT into feedback (name, email, text, date)
        values ('$name','$email', '$text', '$date' )"
    );

    return($result);
}

