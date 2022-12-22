<?php
echo"<style>
.contant{
   max-width: 200px;
   margin: 10px auto;
   padding: 5px;
   BACKGROUND-COLOR:red;
   text-align: center;
}
</style>";

if(file_exists('todo.json')){
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json, true);
    $todoName =  $_POST['todo_name'];
    unset($jsonArray [$todoName]);

    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    echo"<div class='contant'><h1>Deleted</h1></div>";

}
header("refresh:1;url=Todo_index.php");