<?php 
require 'database_conn.php';
$conn=connection();
if(isset($_POST['submit'])){
$title=$_POST['list'];
$description=$_POST['description'];
    if(isset($_POST['description'])){
        $query="INSERT INTO todo_item(title, description) VALUES('$title', '$description')";
        $result=mysqli_query($conn, $query);
        if($result){
            header("Location:home.php");
            exit();
        }else{
            die("query is wrong, refresh the page");
        }
    }else{
        $query="INSERT INTO todo_item(title) VALUES('$title', '$description')";
        $result=mysqli_query($conn, $query);
        if($result){
            header("Location:home.php");
            exit();
        }else{
            die("query is wrong, refresh the page");
        }
    }
}

?>
