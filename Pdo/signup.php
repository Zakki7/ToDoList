<?php
require('connection.php');
$tableExists = $db->query("SHOW TABLES LIKE 'Signup'")->num_rows > 0;

$error = false;

if (!$tableExists) {
        $sql = "CREATE TABLE Signup (
            id int AUTO_INCREMENT,
            name varchar(40),
            email varchar(50), 
            password varchar(30),
            password2 varchar(30);
            primary key (id)
    )";

        if ($db->query($sql) !== TRUE) {
                $error = true;
                echo "Error creating table: " . $db->error;
        }

        if ($error) {
            echo "An error occurred.";
    }

}

