<?php
    
if(isset($_GET['id'])){
    require 'database_conn.php';
    $conn = connection();
    $id = $_GET['id'];
    $checked = "SELECT checked FROM todo_item WHERE todo_id = '$id'";
    $result = mysqli_query($conn, $checked);
    $data = mysqli_fetch_assoc($result);
    if($result){
        if($data['checked'] == 0){
            $query = "UPDATE todo_item SET checked = 1 WHERE todo_id = '$id'";
            $result = mysqli_query($conn, $query);
            if($result){
                header("Location: home.php");
                exit();
            } else {
                die("Query error. Please refresh the page.");
            }
        } else if($data['checked'] == 1){
            $query = "UPDATE todo_item SET checked = 0 WHERE todo_id = '$id'";
            $result = mysqli_query($conn, $query);
            if($result){
                header("Location: home.php");
                exit();
            } else {
                die("Query error. Please refresh the page.");
            }
        }
    } else {
        die("Query error. Please refresh the page.");
    }
}
?>
