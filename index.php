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
                        <th>Name</th>
                        <th>Task</th>
                        <th>Remove</th>
                </tr>

                <tr>
                        
                 <td> . </td>
                 <td>Write</td>          
                
                <td id="del">
                        <a href="#">del </a>
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




<?php
//oops
// class Ucl
// { //class
//         public $Titles;
//         public $Team;
//         function Titles_won($won, $teams)
//         {
//                 $this->Titles = $won;   //-> removes the need for $
//                 $this->Team = $teams;
//                 echo "Titles Won By " . $teams . " : " . $won;
//         }
// }
// $Madrid = new Ucl(); //objects
// $Madrid->Titles_won(15, 'Real Madrid');

// class person
// {
//         public $ids;
//         public $jobs;
//         public $homes;
//         function __construct($id, $job, $home)
//         {
//                 $this->ids = $id;
//                 $this->jobs = $job;
//                 $this->homes = $home;

//                 echo '<br>' . $this->ids . ' ' . $this->jobs . ' ' . $this->homes;
//         }
// }

// $per = new person(2, 'DAE Agent', 'LA');

// //Single inheritance

// class employee extends person
// {
//         public $salary;
//         public $hours;
//         public function __construct($id, $job, $home, $salary, $hours)
//         {
//                 person::__construct($id, $job, $home);
//                 $this->salary = $salary;
//                 $this->hours = $hours;
//         }
//         function Display()
//         {
//                 echo ' ' . $this->salary . ' ';
//                 echo ' ' . $this->hours . ' ';
//         }
// }
// $emp = new employee(4, 'Marketing', 'Jt', 40000, 8);
// $emp->Display();

// //Multi Level Inheritance
// class PLayer extends person
// {
//         public function __construct($id, $job, $home, $club,$rank)
//         {
//                 person::__construct($id, $job, $home);
//                 $this->club = $club;
//                 $this->rank = $rank;
//         }
// }
// class Rank extends PLayer{
//         function __construct($id, $job, $home, $club, $rank){
//                 PLayer::__construct($id, $job, $home, $club,$rank);
//                 $this->id = $id;
//                 $this->job = $job;
//                 $this->home = $home;
//                 $this->rank = $rank;
//                 $this->club = $club;

//                 if($rank >= 90){
//                         echo "<br> Player ID $id";
//                         echo "<br> $job";
//                         echo "<br> $home";
//                         echo  "<br> Club : ", $club;
//                         echo " <br> your rank value is: ", $rank;
//                         echo "<br> Player is Top class";
//                 }
//                 else{
//                         echo "<br> Player ID $id";
//                         echo "<br> $job";
//                         echo "<br> $home";
//                         echo  "<br> Club : ", $club;
//                         echo " <br> your rank value is: ", $rank;
//                         echo "<br> Player is Top class";
//                         echo "<br>Player is Good";
//                 }               
        
//         }
// }
// $Rank = new Rank(1,'Footballer','Portugal','Real Madrid', 92);
// $Rank = new Rank(2,'Footballer','Argentina','Atletico Madrid', 85);
// $Rank = new Rank(3,'Footballer','Spain','Girona', 90);
?>