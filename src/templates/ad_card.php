<link rel="stylesheet" type="text/css" href="style/ad_card.css">

<div class="ad">
    <div class="left-row">
        <img src="<?php echo $ad["image"] ?>">
    </div>

    <div class="ad-info">
        <span class="name"><?php echo $ad["name"]; ?></span>
        <?php

        if (isset($_SESSION["loggedin"])) {
            if ($_SESSION["loggedin"]) {
                $user = $_SESSION["user"];
                if ($user->getUserLevel() == UserLevels::getUserLevels()["admin"]) {
                    $adID = $ad["ID"];
                    echo "<a href='includes/delete_ad.php?id=$adID' class='delete'>X</a>";
                }
            }
        }

        ?>
        <hr>
        <p class="description"><?php echo $ad["description"]; ?></p>
        <hr>
        <span class="price"><?php
            $types = TransactionTypes::getTypes();
            $type = "Ovaj tip ne postoji";

            foreach ($types as $key => $value) {
                if ($value == $ad["type_of_transaction"]) {
                    $type = $key;
                    break;
                }
            }

            echo $type . " | " . $ad["price"] . " KM";
        ?></span>
        <a class="read-more" href="ad_info.php?id=<?php echo $ad["ID"]; ?>">Procitaj vise...</a>
    </div>
</div>
<div class="clear"></div>