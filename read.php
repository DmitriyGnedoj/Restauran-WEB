<?php
date_default_timezone_set("Europe/Kiev");
 $conn = mysqli_connect("localhost","dima", "sD>8oxn6mtc0!0Fq", "mydb");

$login=$_GET['login'];
$password=$_GET['password'];
$records = mysqli_query($conn,"select *  from user where login='".$login."'");

$data = array();

while($row = mysqli_fetch_assoc($records))
{
    $data[] = $row; 
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);

mysqli_close($conn);
$time = date('H-i-s');
echo $time;
?>