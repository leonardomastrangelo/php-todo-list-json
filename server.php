<?php
$filecontent = file_get_contents("todo-list.json");
$list = json_decode($filecontent, true);

header('Content-Type: application/json');
echo json_encode($list);
?>