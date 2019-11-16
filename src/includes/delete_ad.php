<?php

require_once("database.php");
require_once("user.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

// if id is not set go back to index.php
if (!isset($_GET["id"])) {
    header("Location: ../index.php");
}

// if loggedin is not set go back to index.php
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
}

// if user is not loggedin go back to index.php
if (!$_SESSION["loggedin"]) {
    header("Location: ../index.php");
}

// if user is not admin go back to index.php
$user = $_SESSION["user"];
if ($user->getUserLevel() != UserLevels::getUserLevels()["admin"]) {
    header("Location: ../index.php");
}

$database = Database::getInstance();
$connection = $database->getConnection();

$stmt = $connection->prepare("DELETE FROM ad WHERE ID = ?");
$stmt->bind_param("s", $_GET["id"]);
$stmt->execute();

header("Location: ../index.php");

?>
