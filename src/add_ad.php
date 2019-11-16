<?php

require("templates/header.php");

require_once("includes/database.php");
require_once("includes/category.php");
require_once("includes/user.php");

if ($_SERVER["request_method"] = "POST" && isset($_POST["name"])) {
    $categoryID = $category->getCategoryID();
    $creatorID = $user->getUserID();
    $name = $_POST["name"];
    $description = $_POST["description"];
    $phone = $user->getPhone();
    $email = $user->getEmail();
    $price = $_POST["price"];
    $typeOfTransaction = TransactionTypes::OFFER;
}

?>

<div class="ad-form">
    <form class="form" action="add_ad.php" method="POST">
        <select name="category">
            <?php
            
                $categoryList = CategoryList::getInstance();
                $categories = $categoryList->getCategories();
            
                foreach($categories as $indx => $category) {
                    $name = $category->getName();
                    echo "<option value=\"$indx\">$name</option>\n";
                }
            
            ?>
        </select>
        <div class="input-text">
            <input type="text" name="name">
        </div>
        <div class="input-text">
            <textarea name="description"></textarea>
        </div>
        <div class="input-text">
            <input type="text" name="price">
        </div>
        <div class="input-submit">
            <input type="submit" name="submit">
        </div>
    </form>
</div>

<?php require("templates/footer.html"); ?>
