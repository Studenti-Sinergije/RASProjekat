<div class="ad">
    <div class="left-row">
        <img src="<?php echo $row["image"] ?>">
    </div>

    <div class="ad-info">
        <span class="name"><?php echo $row["name"]; ?></span>
        <?php

        if (isset($_SESSION["loggedin"])) {
            if ($_SESSION["loggedin"]) {
                $user = $_SESSION["user"];
                if ($user->getUserLevel() == UserLevels::getUserLevels()["admin"]) {
                    echo "<a href='includes/delete_ad.php' class='delete'>X</a>";
                }
            }
        }

        ?>
        <hr>
        <p class="description"><?php echo $row["description"]; ?></p>
        <hr>
        <span class="price"><?php
            $types = TransactionTypes::getTypes();
            $type = "Ovaj tip ne postoji";

            foreach ($types as $key => $value) {
                if ($value == $row["type_of_transaction"]) {
                    $type = $key;
                    break;
                }
            }

            echo $type . " | " . $row["price"] . " KM";
        ?></span>
        <a class="read-more" href="ad_info.php?id=<?php echo $row["ID"]; ?>">Procitaj vise...</a>
    </div>
</div>
<div class="clear"></div>