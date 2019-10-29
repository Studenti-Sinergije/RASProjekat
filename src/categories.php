<?php
    require("includes/header.php");
    require_once("category/category.php");
    
    $categoryList = CategoryList::getInstance();
    $categories = $categoryList->getCategories();
?>

<link rel="stylesheet" type="text/css" href="style/category.css">
<div class="categories">
    <?php foreach ($categories as $indx => $category): ?>
    <div class="category">
        <img src="images/<?php echo $category->getImage(); ?>" alt="penis">
        <a href="category.php/id=<?php echo $category->getID(); ?>"><?php echo $category->getName(); ?></a>
    </div>    
    <?php endforeach; ?> 
    
    <div class="clear-fix">
    </div>
</div>

<?php
    require("includes/footer.php");
?>
