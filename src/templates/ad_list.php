<link rel="stylesheet" type="text/css" href="style/ad_list.css">

<div class="ad-container">
    <h1><?php echo $title; ?></h1>
    
    <div class="search">
        <form action="index.php" method="POST">
            <input type="text" name="search" placeholder="Probajte nesto">
            <input type="submit" name="submit" value="Pretrazi">
        </form>
    </div>
    
    <?php
    
    foreach ($ads as $ad) {
        include("templates/ad_card.php");
    }
    
    ?>
</div>
