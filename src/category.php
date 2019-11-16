<?php

require("templates/header.php");
require_once("includes/database.php");
require_once("includes/ad.php");
require_once("includes/user.php");
require_once("includes/category.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

if (!isset($_GET["id"])) {
    header("Location: index.php");
}

$database = Database::getInstance();
$connection = $database->getConnection();

$stmt = $connection->prepare("SELECT ID, name, description, price, image, type_of_transaction FROM ad WHERE cat_ID = ?");
$stmt->bind_param("s", $_GET["id"]);
$stmt->execute();

$result = $stmt->get_result();

$categories = CategoryList::getInstance()->getCategories();
$category = $categories[$_GET["id"]];

?>

<link rel="stylesheet" type="text/css" href="style/ad_card.css">

<div class="ad-container">
    <h1><?php echo $category->getName(); ?></h1>
    
    <?php 
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include("templates/ad_card.php");
        }
    }
    
    ?>
</div>

<?php
    require("templates/footer.html");
?>
