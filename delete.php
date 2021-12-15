<?php
    $id = $_GET['id'];
    require_once "connection.php";
    $query = "delete from students where id = $id ";

    if(mysqli_query($link, $query)){
        header("location: index.php");
    }
    else{
        echo"something went wrong ...";
    }
?>