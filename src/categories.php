<?php

require("templates/header.php");
require_once("includes/category.php");

$categoryList = CategoryList::getInstance();
$categories = $categoryList->getCategories();

?>

<link rel="stylesheet" type="text/css" href="style/category.css">
<div class="categories">
    <?php foreach ($categories as $indx => $category): ?>
    <div class="category-container">
        <div class="category-item">
            <img src="images/<?php echo $category->getImage(); ?>" alt="penis">
            <a href="category.php/id=<?php echo $category->getID(); ?>"><?php echo $category->getName(); ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php require("templates/footer.html"); ?>
