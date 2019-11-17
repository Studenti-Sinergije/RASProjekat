<?php

require("templates/header.php");
require_once("includes/database.php");
require_once("includes/ad.php");
require_once("includes/category.php");

if (!isset($_GET["id"])) {
    header("Location: index.php");
}

$database = Database::getInstance();
$connection = $database->getConnection();

$stmt = $connection->prepare("UPDATE ad SET num_of_views = num_of_views + 1 WHERE id = ?");
$stmt->bind_param("s", $_GET["id"]);
$stmt->execute();

$stmt = $connection->prepare("SELECT * FROM ad WHERE id = ?");
$stmt->bind_param("s", $_GET["id"]);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows < 1) {
    header("Location: index.php");
}

$row = $result->fetch_assoc();
$ad = new Ad($row["ID"], $row["cat_ID"], $row["creator_ID"], $row["created_on"], $row["num_of_views"],
             $row["name"], $row["description"], $row["price"], $row["type_of_transaction"], $row["image"]);

$categories = CategoryList::getInstance()->getCategories();
$category = $categories[$row["cat_ID"]];

$stmt = $connection->prepare("SELECT email, phone FROM users WHERE ID = ?");

$creatorID = $ad->getCreatorID();
$stmt->bind_param("s", $creatorID);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows < 1) {
    header("Location: index.php");
}

$creatorInfo = $result->fetch_assoc();

?>

<link rel="stylesheet" type="text/css" href="style/ad_info.css">

<div class="ad-container">
    <div class="breadcrumbs">
        <a href="categories.php">Kategorije-></a>
        <a href="category.php?id=<?php echo $category->getID(); ?>"><?php echo $category->getName() . "->"; ?></a>
        <a href="ad_info.php?id=<?php echo $ad->getID(); ?>"><?php echo $ad->getName(); ?></a>
    </div>
    
    <h2 class="name"><?php echo $ad->getName(); ?></h2>
    
    <div class="ad-info">
        <div class="info">
            <span class="label">Cijena: </span>
            <span class="data"><?php echo $ad->getPrice(); ?> KM</span>
        </div>
        <div class="info">
            <span class="label">Tip: </span>
            <span class="data"><?php echo $ad->getTypeOfTransaction(); ?></span>
        </div>
        <div class="info">
            <span class="label">Datum objave: </span>
            <span class="data"><?php echo $ad->getCreatedOn(); ?></span>
        </div>
        <div class="info">
            <span class="label">Broj pregleda: </span>
            <span class="data"><?php echo $ad->getNumOfViews(); ?></span>
        </div>
        <h3>Kontakt</h3>
        <div class="info">
            <span class="label">Email: </span>
            <span class="data"><?php echo $creatorInfo["email"]; ?></span>
        </div>
        <div class="info">
            <span class="label">Broj telefona: </span>
            <span class="data"><?php echo $creatorInfo["phone"]; ?></span>
        </div>
    </div>
    
    <div class="ad-image">
        <img src="<?php echo $ad->getImage(); ?>">
    </div>
    
    <div class="clearfix"></div>
    
    <h3>Opis</h3>
    <div class="ad-description">
        <p><?php echo $ad->getDescription(); ?></p>
    </div>
</div>

<?php require("templates/footer.html"); ?>
