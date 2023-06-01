<?php
function connection(){
    $conn=mysqli_connect("localhost", "root", "");
    if($conn){
      mysqli_select_db($conn, "to_do_list");
      return $conn;
    }else{
      die("<h1>Connection to database failed, Refresh the page</h1>");
    }
  }
?>