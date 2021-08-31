

<?php
date_default_timezone_set("Europe/Kiev");
 $conn = mysqli_connect("localhost","dima", "sD>8oxn6mtc0!0Fq", "mydb");

/*$login = $_GET['login'];
$password = $_GET['password'];*/
$check=$_GET['check'];

/*

*/
$records = mysqli_query($conn,"select id  from actionorders where id_waiter=".$check." and status=2 group by id");

$data = array();
$b = false;

while($row = mysqli_fetch_assoc($records))
{
	if($row){
		$count++;
    $data[] = $row; 

		echo "Заказ №".$row["id"]." готов \n";
		$b=true;
		
	
	}
}
if(!$b){

		echo "Не найдено";
}

mysqli_close($conn);
  
?>