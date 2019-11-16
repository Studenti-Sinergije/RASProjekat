<?php

require("templates/header.php");

require_once("includes/database.php");
require_once("includes/category.php");
require_once("includes/user.php");
require_once("includes/ad.php");

if (session_id() == '' || !isset($_SESSION))
    session_start();

// If not logged in we redirect to start page
if (isset($_SESSION["loggedin"])) {
    if (!$_SESSION["loggedin"]) {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

if ($_SERVER["request_method"] = "POST" && isset($_POST["name"])) {
    $categories = CategoryList::getInstance()->getCategories();
    $user = $_SESSION["user"];
    
    $categoryID = $categories[$_POST["category"]];
    $creatorID = $user->getID();
    $name = $_POST["name"];
    $description = $_POST["description"];
    $phone = $user->getPhone();
    $email = $user->getEmail();
    $price = $_POST["price"];
    $typeOfTransaction = $_POST["type"];
}

?>

<link type="text/css" rel="stylesheet" href="style/add_ad.css">

<div class="background">
    <h1>Dodaj oglas</h1>
    
    <div class="form-container">
        <form class="form" action="add_ad.php" method="POST">
            <div class="input">
                <span>Kategorija</span>
                <select name="category">
                    <?php

                    $categoryList = CategoryList::getInstance();
                    $categories = $categoryList->getCategories();

                    foreach($categories as $indx => $category) {
                        $name = $category->getName();
                        echo "<option value='$indx'>$name</option>\n";
                    }

                    ?>
                </select>
            </div>
            <div class="input">
                <span>Naziv oglasa</span>
                <input type="text" name="name">
            </div>
            <div class="input">
                <span>Opis</span>
                <textarea name="description"></textarea>
            </div>
            <div class="input">
                <span>Cijena</span>
                <input type="text" name="price">
            </div>
            <div class="input">
                <span>Tip</span>
                <select name="type">
                    <?php

                    $types = TransactionTypes::getTypes();

                    foreach($types as $type => $value) {
                        echo "<option value='$value'>$type</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="input">
                <span>Slika</span>
                <input type="file" name="image">
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Dodaj oglas">
            </div>
        </form>
    </div>
</div>

<?php require("templates/footer.html"); ?>
