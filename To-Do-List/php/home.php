<?php
require 'database_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class='container'>
        <h1>To-Do List</h1>
        <form action='add.php' onSubmit='return CheckInput(event)' autocomplete='off' method='post' id='form'>
        <input type="text" placeholder="Enter your To-Do List" name="list" id="list" class="input" size="20">
            <textarea cols="20" rows="2" name="description" id="todo-description" class='input' placeholder='Description (Optional)'></textarea>
            <input type="submit" class="submit" name="submit" value="Add">
        </form>
        <?php 
            $conn = connection();
            $todos = mysqli_query($conn, "SELECT * FROM todo_item ORDER BY todo_id DESC");
        ?>
        <div id="todo-list">
            <?php 
            if ($todos) {
                $row = mysqli_num_rows($todos);
                if ($row == 0) { ?>
                    <div class="todo-item">
                        <div class='empty'>
                            <h2 style='color:#AED6F1; text-align:center;'>Enter your ToDo List</h2>
                            <img src='../images/empty.jpg' width='100%' />
                        </div>
                    </div>
                <?php
                }
            } else {
                die('query syntax error, refresh the page');
            }?>

            <?php 
            while ($todo = mysqli_fetch_assoc($todos)) { ?>
                <div class="todo-item">
                    <span name="<?php echo $todo['todo_id']; ?>" class="delete" onclick="location.href='delete.php?id=<?php echo $todo['todo_id']; ?>'">x</span>
                    <?php if ($todo['checked']) { ?>
                        <div class='description' onclick='description()' title='Click to see the description'>
                            <input type="checkbox" class="check-box" checked onclick="location.href='check.php?id=<?php echo $todo['todo_id']; ?>'">
                            <h2 class='checked'><?php echo $todo['title'] ?></h2>
                            <p class='content checked'><?php echo $todo['description'] ?></p>
                        </div> 
                    <?php } else { ?>
                        <div class='description' onclick='description()' title='Click to see the description'>
                            <input type="checkbox" class="check-box" onclick="location.href='check.php?id=<?php echo $todo['todo_id']; ?>'">
                            <h2><?php echo $todo['title'] ?></h2>
                            <p class='content'><?php echo $todo['description'] ?></p>
                        </div>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
       
    </div>
    <script src='../js/home.js'></script>
</body>
</html>
