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
    private $price;
    private $typeOfTransaction;
    private $image;

    public function __construct($id, $catID, $creatorID, $createdOn, $numOfViews, $name, $description,
                                  $price, $typeOfTransaction, $image) {
        $this->id = $id;
        $this->catID = $catID;
        $this->creatorID = $creatorID;
        $this->createdOn = $createdOn;
        $this->numOfViews = $numOfViews;
        $this->name = $name;
        $this->description = $description;
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

    public function getPrice() {
        return $this->price;
    }

    public function getTypeOfTransaction() {
        $types = TransactionTypes::getTypes();

        $type = "";
        foreach ($types as $key => $value) {
            if ($value == $this->typeOfTransaction) {
                $type = $key;
                break;
            }
        }
        
        return $type;
    }

    public function getImage() {
        return $this->image;
    }

}

class TransactionTypes {
    
    public static function getTypes() {
        $types = array();
        $types["Ponuda"]      = 0;
        $types["Potraznja"]   = 1;
        $types["Zamjena"]     = 2;
        return $types;
    }
    
}

?>
