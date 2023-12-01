<?php
$filecontent = file_get_contents("todo-list.json");
$list = json_decode($filecontent, true);

if (isset($_POST['task'])) {
    $task = $_POST['task'];

    array_unshift($list, $task);
    file_put_contents("todo-list.json", json_encode($list));
}
header('Content-Type: application/json');
echo json_encode($list);
?>