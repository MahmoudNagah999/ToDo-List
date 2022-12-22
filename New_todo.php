<?PHP

echo"<style>
 .contant{
    max-width: 200px;
   margin: 10px auto;
   padding: 5px;
   text-align: center;
    BACKGROUND-COLOR:lawngreen;
}
.danger{
   max-width: 200px;
   margin: 10px auto;
   padding: 5px;
   BACKGROUND-COLOR:red;
   text-align: center;
}
</style>";
if(!$_POST['nametodo']){
    echo"<div class='danger'><h1>field empty</h1></div>";
    header("refresh:1;url=Todo_index.php"); 
}

$todo_name = $_POST["nametodo"] ?? "";
$todo_name = trim($todo_name);

if($todo_name){
        if(file_exists("todo.json")){
            $json = file_get_contents("todo.json");
            $json_Array = json_decode($json , true);
        }else{
            $json_Array = [];
        }
        
        $json_Array[$todo_name] = ['completed' => false];
        file_put_contents("todo.json", json_encode($json_Array, JSON_PRETTY_PRINT ));
        // echo"<div class='alert alert-sucsses text-center'>Added Done</div>";
        echo"<div class='contant'><h1>Added Done</h1></div>";


}
    header("refresh:1;url=Todo_index.php");

    // header ('location: Todo_index.php'); 