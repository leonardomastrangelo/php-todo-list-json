<?php
$filecontent = file_get_contents("todo-list.json");
$list = json_decode($filecontent, true);

if (!empty($_POST['task'])) {
    $task = $_POST['task'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $priority = $_POST['priority'];
    $text = $_POST['text'];
    $doneTask = $_POST['doneTask'];
    $newTask = [
        'task' => $task,
        'id' => intval($id),
        'name' => $name,
        'image' => $image,
        'priority' => $priority,
        'text' => $text,
        'doneTask' => $doneTask
    ];
    array_unshift($list, $newTask);
    file_put_contents("todo-list.json", json_encode($list));
}
header('Content-Type: application/json');
echo json_encode($list);
?>