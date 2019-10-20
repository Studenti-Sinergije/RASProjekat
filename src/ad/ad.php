<?php
    class Ad {
        
        private const id;
        private const catID;
        private const creatorID;
        private const createdOn;
        private const numOfViews;
        private const name;
        private const description;
        private const phone;
        private const email;
        private const price;
        private const typeOfTransaction;
        
        public function __construction($id, $catID, $creatorID, $createdOn, $numOfViews, $name, $description, $phone,
                                      $email, $price, $typeOfTransaction) {
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
        
    }

    class TransactionTypes {
        public const OFFER = 0;
        public const DEMAND = 1;
    }
?>
