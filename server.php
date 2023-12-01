<?php
$filecontent = file_get_contents("todo-list.json");
$list = json_decode($filecontent, true);

if (!empty($_POST['task'])) {
    $newTask = [
        'task' => $_POST['task'],
        'id' => intval($_POST['id']),
        'name' => $_POST['name'],
        'image' => $_POST['image'],
        'priority' => $_POST['priority'],
        'text' => $_POST['text'],
        'doneTask' => (bool) $_POST['doneTask']
    ];
    array_unshift($list, $newTask);
    file_put_contents("todo-list.json", json_encode($list));
}
if (isset($_POST["deleteTask"])) {
    $index = $_POST["deleteTask"];
    array_splice($list, $index, 1);
    file_put_contents("todo-list.json", json_encode($list));
}
if (isset($_POST["done"])) {
    $index = $_POST["done"];
    $list[$index]['doneTask'] = !$list[$index]['doneTask'];
    file_put_contents("todo-list.json", json_encode($list));
}
header('Content-Type: application/json');
echo json_encode($list);
?>