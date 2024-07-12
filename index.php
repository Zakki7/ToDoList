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
        if (empty(trim($task))){
                $error = "You must fill the space";
               

        }       
        $query = ("INSERT INTO Tasks (Task) VALUES ('$task') ");
        mysqli_query($db,$query);
                

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
                       
                <button id = "sub" type="submit" name="submit" id="add_btn" class="add_btn">submit</button>
                <?php 
                                if (isset($_POST["submit"])) {
                                 $task = $_POST[""];
                                 echo '<br>' . $error;
                                }
                        ?>

        </form>
        <table>

                <tr id='tab'>
                        <th>Name</th>
                        <th>Task</th>
                        <th>Remove</th>
                </tr>
                <tbody>
                        
                        <tr>
                                <td>.</td>
                                <td>
                                        <?php
                                        if (isset($_POST['task'])) {
                                                echo $_POST['task'];
                                        }
                                        ?>
                                </td>
                                <td id ="del">
                                        <a href="#">del
                                                <?php
                                                if (isset($_POST[''])) {
                                                    $task = '';    
                                                }
                                                ?>
                                        </a>
                                </td>
                        </tr>
                </tbody>

                <?php
                 
                ?>


        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
                $('td').slideUp(1000).slideDown(1000);
                $('th').slideUp(2000).slideDown(1000);
             
                    
        </script>



</body>

</html>




<?php
        //         $arr = array("Monday" => 'Kitchen',"Tuesday" => 'Bed',  4 => 'Wardrobe','Toilet','Yard');
                //         $lis = $arr;
                //         $key = array_keys($arr);
                
                //         foreach($arr as $key => $value){
                //                 echo $key.' '.$value.' <br> ';
                //         }
                //         // for ($i = 0; $i < count($key); $i++){
                //         //         // if ($i == 2 or $i== 3) {
                //         //         //         continue;
                //         //         // }
                //         //         echo $key[$i]. ' = '. $arr[$key[$i]] . " Today's <br>";
                //         // }
                //         // echo count($arr);
                // 
                
                // $arr = array('Zaki' => array('Monday' => 'job', 'Tuesday' => 'Uni', 'Wednesday' =>'off', 'Thursday' => 'job', 'Friday' => 'Uni'),
                //              'Hadia' => array('Monday' => '', 'Tuesday' => 'Uni', 'Wednesday' =>'off', 'Thursday' => 'job', 'Friday' => 'Uni'));
                
                //         foreach($arr as $value):
                //         foreach($value as $key => $data):
                //                 echo $data . $key . $value . '<br>';        
                //         endforeach;
                // endforeach;
                
                //Type specifier
                
                // $a = 123;
                // $b = "Movies";
                // $c = 20;
                // //        printf("Watch Latet movies on %d %s only for %d $", $a, $b, $c);
                // printf("%40d", 2345);
                // function display()
                // {
                //         echo "Function";
                // }
                // display();
               
?>

