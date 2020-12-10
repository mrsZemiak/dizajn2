<?php

require_once 'classes/database.php';
use classes\database;


if (isset($_POST['delete'])) {
    $newdelete = new database();
    $result = $newdelete->deleteTodo();
    echo $result;
}