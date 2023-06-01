<?php
    
    if(isset($_GET['id'])){
        require 'database_conn.php';
        $conn = connection();
        $id = $_GET['id'];
        $query = "DELETE FROM todo_item WHERE todo_id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            // Record deleted successfully
            header("Location: home.php");
            exit();
        } else {
            die("Query error. Please refresh the page.");
        }
    }
?>