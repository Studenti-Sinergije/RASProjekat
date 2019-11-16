<?php

require_once("includes/database.php");

class Ad {

    private $id;
    private $catID;
    private $creatorID;
    private $createdOn;
    private $numOfViews;
    private $name;
    private $description;
    private $phone;
    private $email;
    private $price;
    private $typeOfTransaction;
    private $image;

    public function __construction($id, $catID, $creatorID, $createdOn, $numOfViews, $name, $description, $phone,
                                  $email, $price, $typeOfTransaction, $image) {
        $this->id = $id;
        $this->catID = $catID;
        $this->creatorID = $creatorID;
        $this->createdOn = $createdOn;
        $this->numOfViews = $numOfViews;
        $this->name = $name;
        $this->description = $description;
        $this->phone = $phone;
        $this->email = $email;
        $this->price = $price;
        $this->typeOfTransaction = $typeOfTransaction;
        $this->image = $image;
    }

    public function getID() {
        return $this->id;
    }

    public function getCatID() {
        return $this->catID;
    }

    public function getCreatorID() {
        return $this->creatorID;
    }

    public function getCreatedOn() {
        return $this->createdOn;
    }

    public function getNumOfViews() {
        return $this->numOfViews;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getTypeOfTransaction() {
        return $this->typeOfTransaction;
    }

    public function getImage() {
        return $this->image;
    }

}

class TransactionTypes {
    
    public static function getTypes() {
        $types = array();
        $types["OFFER"]    = 0;
        $types["DEMAND"]   = 1;
        $types["EXCHANGE"] = 2;
        return $types;
    }
    
}

class AdList {

    private static $instance = null;

    private $list;

    private function __construct() {
        $this->list = array();

        $database = Database::getInstance();
        $connection = $database->getConnection();

        $query = "SELECT * FROM oglas";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["ID"];
                $catID = $row["cat_ID"];
                $creatorID = $row["creator_ID"];
                $createdOn = $row["created_on"];
                $numOfViews = $row["num_of_views"];
                $name = $row["name"];
                $description = $row["description"];
                $phone = $row["phone"];
                $email = $row["email"];
                $price = $row["price"];
                $typeOfTransaction = $row["type_of_transaction"];
                $image = $row["image"];
            }
        }
    }

    public function getAds() {
        return $this->list;
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new AdList();
        }
        return self::$instance;
    }

}

?>
