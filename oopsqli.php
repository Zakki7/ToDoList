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

$sql = "SELECT * FROM Tasks";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<br>
    <form action="" name="submit">
    Enter here
        <input type="text" value="">
        <button>
            sumbit
        </button>
        

    </form>
    <?php
    

    if ($result->rowCount() > 0) {
        echo "<table>";
        echo "<thread>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Task</th>";
        echo "</tr>";
        echo "</thread>";
        echo "<tbody>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['Task'] . "</td>";
            echo "</tr>";
            echo "</tbody>";
            
        }
        echo "</table>";
    }
    ?>
    
</body>

</html>