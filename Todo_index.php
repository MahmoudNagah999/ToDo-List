<?php

$todos = [];

if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/bootstrap.min.css" />
    <link rel="stylesheet" href="Css/font-awesome.min.css" />
    <link rel="stylesheet" href="Css/style.css" />
    <title>TODO LIST</title>
</head>
<body>
    <div class="contant">
        <h1> TODO List </h1>
        <form class="add-todo" action="New_todo.php" method="POST">
            <div>
                <input type="text" name="nametodo" placholder="Enter your ToDo">
                <button class="btn btn-success">New Task</button>
                <div class='invalid-feedback' style='color:red'>
                    <?php echo isset($errors['nametodo']) ? $errors['nametodo']: '' ?>
                </div>
            </div>
        </form>

    <table>
        <tr>
            <td>Completed</td>
            <td> Name</td>
            <td>Delete</td>
        </tr>
   
        <?php foreach($todos as $todoName => $todo) : ?>

        <tr>
            <td>
                <form action="change_status.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName?>">   
                    <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?> >
                </form>
            </td>

            <td>  
                <?php echo $todoName; ?>
            </td>

            <td>
                <form action="delete.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
                    <button class="btn btn-danger" onclick="return confirm('are u sure !')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    </div>   
   
    <script src="JS/main.js"></script>
</body>
</html>