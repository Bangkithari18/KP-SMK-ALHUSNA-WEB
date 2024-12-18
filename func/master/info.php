<?php
session_start();

require_once __DIR__ . '/../../db_connection.php';
require_once __DIR__ . '/../../controllers/MasterInfoController.php';

$title = $_POST["title"];
$content = $_POST["content"];
$attachment = $_POST["attachment"];
$create_user = "Yanor";

$helper = new MasterInfoController($db);

$result = $helper->addInfo($title, $content, $attachment, $create_user);
if ($result) {
    echo 'success';
} else {
    echo 'error';
}
