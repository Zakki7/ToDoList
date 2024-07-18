<?php
$errors = "";
$db = mysqli_connect('localhost', 'root', '', 'todo');

if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
}

$tableExists = $db->query("SHOW TABLES LIKE 'Tasks'")->num_rows > 0;

$error = false;

if (!$tableExists) {
        $sql = "CREATE TABLE Tasks (
            id int AUTO_INCREMENT,
            Task varchar(255), 
            primary key (id)
    )";

        if ($db->query($sql) !== TRUE) {
                $error = true;
                echo "Error creating table: " . $db->error;
        }
}

if ($error) {
        echo "An error occurred.";
}



if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        if (empty($task)) {
                $error = "You must fill the space";

        } else {
                $query = ("INSERT INTO Tasks (Task) VALUES ('$task') ");
                mysqli_query($db, $query);

        }

}
$que = "SELECT * from Tasks";
$result = $db->query($que);

if (isset($_POST["id"])) {
        $id = $_POST['id'];
        $del = mysqli_query($db, "DELETE FROM Tasks where 'id'= '$id' ");
}


?>

<!DOCTYPE html>
<html>

<head>
        <title>ToDo List Application</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
        <div class="heading">
                <h2> ToDo List Application PHP</h2>
        </div>
        <form method="post" action="index.php" class="input_form">

                <input type="text" name="task" class="task_input">

                <button id="sub" type="submit" name="submit" id="add_btn" class="add_btn">submit</button>
                <?php

                echo '<br> <br>' . $error;

                ?>

        </form>
        <table>

                <tr id='tab'>
                        <th></th>
                        <th>Task</th>
                        <th>Remove</th>
                </tr>

                
                <?php
                        if ($result->num_rows > 0) {
                                
                                while($row = $result->fetch_assoc()){
                                        echo "<tr>
                                        <td>" . $row['$id'] . "</td> 
                                        <td>" . $row['Task'] . "</td>
                                        <td> 
                                        <button class= 'del-button " .$row['id'] . "'  = >Delete</button> 
                                        </td>
                                        <tr>";
                                }
                
                                echo "</table>";
                        }
                        else{
                                echo "No Tasks";
                        
                        }

                       
                        
                
                        
                        ?>

</td>

                        
                </tr>


        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
                $('td').slideUp(1000).slideDown(1000);
                $('th').slideUp(2000).slideDown(1000);


        </script>



</body>

</html>



