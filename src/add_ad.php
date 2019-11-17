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

$error = "";

if ($_SERVER["request_method"] = "POST" && isset($_POST["name"])) {
    $categories = CategoryList::getInstance()->getCategories();
    $user = $_SESSION["user"];
    
    $categoryID = $categories[$_POST["category"]]->getID();
    $creatorID = $user->getID();
    $numOfViews = 0;
    $name = $_POST["name"];
    $description = $_POST["description"];
    
    $price = $_POST["price"];
    if (!is_numeric($price)) {
        $error = "Cijena nije broj";
    }
    
    $typeOfTransaction = $_POST["type"];
    
    $image = $_FILES["image"]["tmp_name"];
    if (!checkImage($image)) {
        $error = "Fajl nije slika";
    }
    
    if ($error == "") {
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $fileName = "images/" . strval(time()) . "." . $extension;
        rename($image, $fileName);
        
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $stmt = $connection->prepare("INSERT INTO ad(cat_ID, creator_ID, num_of_views, name, description, price, type_of_transaction, image)
                                      VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $categoryID, $creatorID, $numOfViews, $name, $description, $price, $typeOfTransaction, $fileName);
        $stmt->execute();
        
        header("Location: index.php");
    }
}

function checkImage($image) {
    $check = getimagesize($image);
    if ($check !== false) {
        return true;
    } else {
        return false;
    }
}

?>

<link type="text/css" rel="stylesheet" href="style/add_ad.css">

<div class="background">
    <h1>Dodaj oglas</h1>
    
    <div class="form-container">
        <form class="form" action="add_ad.php" method="POST" enctype="multipart/form-data">
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
            
            <?php 
                if ($error != "") {
                    echo "<p>$error</p>";
                }
            ?>
        </form>
    </div>
</div>

<?php require("templates/footer.html"); ?>
