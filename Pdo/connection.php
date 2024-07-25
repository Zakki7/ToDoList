<?php
$dsn = "mysql:host=localhost; dbname=todo;";
$db_user = "root";
$db_pass = "";

try {
    $con = new PDO($dsn, $db_user, $db_pass);
    echo "connected";
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
