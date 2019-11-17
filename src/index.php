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

$numberOfPages = 0;

if (isset($_POST["submit"])) {
    $stmt = $connection->prepare("SELECT `ID`, `name`, `description`, `price`, `image`, `type_of_transaction` FROM ad WHERE `name` LIKE ? OR `description` LIKE ?");
    
    $expression = "%" . $_POST["search"] . "%";
    
    $stmt->bind_param("ss", $expression, $expression);
    $stmt->execute();
    
    $result = $stmt->get_result();
} else {
    $resultsPerPage = 10;
    $currentPage = 1;
    
    $result = $connection->query("SELECT COUNT(ID) AS total_rows FROM ad");
    
    $totalRows = $result->fetch_assoc()["total_rows"];
    $numberOfPages = ceil($totalRows / $resultsPerPage);
    
    if (isset($_GET["page"])) {
        $currentPage = $_GET["page"];
    }
    
    if ($currentPage < 1) {
        $currentPage = 1;
    }
    
    if ($currentPage > $numberOfPages) {
        $currentPage = $numberOfPages;
    }
    
    $startIndx = ($currentPage - 1) * $resultsPerPage;
    
    $result = $connection->query("SELECT ID, name, description, price, image, type_of_transaction FROM ad ORDER BY created_on DESC LIMIT $startIndx, $resultsPerPage");
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
