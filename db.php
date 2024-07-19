
<?php 
/* To check wether the data is being fetched from db to html page */
$con = mysqli_connect("localhost","root","","todo");
if(!$con){
    die  ("Fail");

}

$sql = "SELECT * FROM Tasks";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_fetch_assoc($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Id : ".$row ['id']. "<br>";
    }
} else{
 echo "No data";
}

