<?php
$filecontent = file_get_contents("todo-list.json");
$list = json_decode($filecontent, true);

if (isset($_POST['task'])) {
    $newTask = json_decode($_POST['task'], true);
    $newTask['id'] = max(array_column($list, 'id')) + 1;
    $newTask['name'] = "Leonardo";
    $newTask['image'] = "img/us.png";
    $newTask['task'] = $newTask;
    $newTask['priority'] = "text-bg-success";

    array_unshift($list, $newTask);

    file_put_contents("todo-list.json", json_encode($list));
}
header('Content-Type: application/json');
echo json_encode($list);
?>