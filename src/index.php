<?php

require("templates/header.php");
require_once("includes/database.php");
require_once("includes/ad.php");
require_once("includes/user.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

$database = Database::getInstance();
$connection = $database->getConnection();

$result = null;

if (isset($_POST["submit"])) {
    $stmt = $connection->prepare("SELECT `ID`, `name`, `description`, `price`, `image`, `type_of_transaction` FROM ad WHERE `name` LIKE ? OR `description` LIKE ?");
    
    $expression = "%" . $_POST["search"] . "%";
    
    $stmt->bind_param("ss", $expression, $expression);
    $stmt->execute();
    
    $result = $stmt->get_result();
} else {
    $result = $connection->query("SELECT ID, name, description, price, image, type_of_transaction FROM ad ORDER BY RAND() LIMIT 15");
}

$ads = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ads[] = $row;
    }
}

$title = "Izdvojeni oglasi";

require("templates/ad_list.php");
require("templates/footer.html");

?>
