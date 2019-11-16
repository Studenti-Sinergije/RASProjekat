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

?>

<link rel="stylesheet" type="text/css" href="style/index.css">

<div class="ad-container">
    <h1>Izdvojeni oglasi</h1>
    
    <div class="search">
        <form action="index.php" method="POST">
            <input type="text" name="search" placeholder="Probajte nesto">
            <input type="submit" name="submit" value="Pretrazi">
        </form>
    </div>
    
    <?php 
    
    if ($result != null) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                include("templates/ad_card.php");
            }
        }
    }
    
    ?>
</div>

<?php
    require("templates/footer.html");
?>
