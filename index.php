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

if (isset($_REQUEST['delete'])){
        $del = ("DELETE FROM Tasks WHERE id = {$_REQUEST['id']}");
        if (mysqli_query($db, $del)){
                
        }
        else{
                echo "Error";
        }

}

?>

<!DOCTYPE html>
<html>

<head>
        <title>ToDo List Application</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="style.css?v= <? $version ?> ">
</head>

<body>
        <div class="heading">
                <h2> ToDo List Application PHP</h2>
        </div>
        <form class= "data" method="post" action="index.php" class="input_form">

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
                                
                                while($row = mysqli_fetch_assoc($result)){
                                        
                                        echo "<tr>";
                                        echo "<td>" . '.' .  "</td>"; 
                                        echo "<td>" . $row['Task'] .   "</td>"; 
                                        echo '<td>
                                        <form action="index.php" method="POST">
                                          <input type="hidden" name="id" value= '. $row['id']. '>
                                          <input type="submit" class="btn btn-sm btn-danger custom-btn" name="delete" value="Delete">
                                        </form>
                                      </td>';
                                        
                                }
                
                                echo "</table>";
                        }
                        else{
                                echo "<tr>
                                        <td>" . '.' . "</td> 
                                        <td>" . 'No Task ' . "</td>
                                        <td>
                                        </tr>"; 
                        }

                       
                        
                
                        
                        ?>

</td>

                        
                </tr>


        </table>
        <?php $db->close()?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
                $('td').slideUp(1000).slideDown();
                $('th').slideUp(2000).slideDown();


        </script>


</body>

</html>



