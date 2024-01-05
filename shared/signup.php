<?php

$uname = $_POST['uname'];
$upass = $_POST["upass1"];
$usertype=$_POST['usertype'];

include "../shared/connection.php";

$sql_result = mysqli_query($conn, "insert into user(username, password,usertype) values('$uname', '$upass','$usertype') ");

if ($sql_result) {
    echo "Registered successfully!";
}
else {
    echo "Error in SQL";
}

?>
