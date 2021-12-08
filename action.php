<?php
session_start();
require "db.php";

if($_GET['action'] == "delete" || $_GET['action'] == "deny")
{
    $db->query('DELETE FROM friends WHERE id ='.$_GET['id']);
    header("Location:user.php");
}

if($_GET['action'] == "add")
{
    $query = $db->prepare('INSERT INTO friends(username_1, username_2, is_pending) VALUES (:username_1, :username_2, :is_pending)');
    $query->execute([
        "username_1" => $_SESSION['user'],
        "username_2" => $_GET['username'],
        "is_pending" => 1
    ]);
    header("Location:user.php");
}

if($_GET['action'] == "accept")
{
    $db->query('UPDATE friends SET is_pending = 0 WHERE id ='.$_GET['id']);
    header("Location:user.php");
}