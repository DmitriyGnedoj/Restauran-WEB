

<?php
date_default_timezone_set("Europe/Kiev");
 $conn = mysqli_connect("localhost","dima", "sD>8oxn6mtc0!0Fq", "mydb");


$number=$_GET['number'];

/*

*/



$img=mysqli_fetch_assoc(mysqli_query($conn,"select  sum(dish.newprice*actionorders.count) from dish, actionorders where actionorders.id_dish = dish.id and actionorders.id=".$number));
$sumToCheck = $img["sum(dish.newprice*actionorders.count)"];


$date = date('Y-m-d');
$status=0;

$time = date('Y-m-d H-i-s');
$insertdata= "insert into scope (datescope, pricescope, idorder, time) VALUEs ('$date',$sumToCheck,$number,'$time')";
if(mysqli_query($conn,$insertdata))
{
     echo "success";

}
else
{
     echo "failed";
	
}
$queryupdate = "update actionorders set status=3 where id=".$number;
mysqli_query($conn,   $queryupdate);



/*
$q=mysqli_fetch_assoc(mysqli_query($conn,"SELECT max(id) FROM actionorders"));
$newid= $q["max(id)"]+1;
$mass=array();
$mass["max"]=$newid;



*/
mysqli_close($conn);
  
?>