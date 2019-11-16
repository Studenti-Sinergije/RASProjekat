<?php

require("templates/header.php");
require_once("includes/database.php");
require_once("includes/ad.php");
require_once("includes/user.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

$database = Database::getInstance();
$connection = $database->getConnection();

$query = "SELECT ID, name, description, price, image, type_of_transaction FROM ad ORDER BY RAND() LIMIT 15";
$result = $connection->query($query);

?>

<link rel="stylesheet" type="text/css" href="style/ad_card.css">

<div class="ad-container">
    <h1>Izdvojeni oglasi</h1>
    
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
