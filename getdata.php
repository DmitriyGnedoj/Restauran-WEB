

<?php
date_default_timezone_set("Europe/Kiev");
 $conn = mysqli_connect("localhost","dima", "sD>8oxn6mtc0!0Fq", "mydb");

/*$login = $_GET['login'];
$password = $_GET['password'];*/
$dish=$_GET['dish'];
$count = $_GET['count'];
$table = $_GET['table'];
$waiter = $_GET['waiter'];
/*

*/



$img=mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM dish where name_dish like '%".$dish."%'"));
$iddish = $img["id"];

$q=mysqli_fetch_assoc(mysqli_query($conn,"SELECT max(id) FROM actionorders"));
$newid= $q["max(id)"]+1;
$mass=array();
$mass["max"]=$newid;

$date = date('Y-m-d');
$status=0;

$time = date('Y-m-d H-i-s');
$insertdata= "insert into actionorders (id, id_dish,count, tableid,id_waiter, status,date,time) VALUEs ($newid,$iddish,$count,$table,$waiter,$status,'$date','$time')";






if(mysqli_query($conn,$insertdata))
{
     echo "success".$newid;

}
else
{
     echo "failed";
	
}

mysqli_close($conn);
  
?>