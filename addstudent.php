<?php 
//getting connection here
require_once "connection.php";

//getting form data 
$name = $_POST['name'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];

//prepared query
$query = "insert into students(name, city, mobile) values (?, ?, ?)";
 // note:-  s->string , i-> integer , d= double , f -> float
if($stmt = mysqli_prepare($link, $query)){
    mysqli_stmt_bind_param($stmt, "sss", $std_name, $std_city, $std_mobile);
    $std_name = $name;
    $std_city = $city;
    $std_mobile = $mobile;

   if(mysqli_stmt_execute($stmt)){
    header("location: index.php");
    exit();

   }
   else{
        echo "oops ! something went wrong lease try again later. ";
   }
 }
?>