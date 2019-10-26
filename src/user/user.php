<?php

    require_once("includes/database.php");

    class User {
        
        private $id;
        private $email;
        private $phone;
        private $createdOn;
        private $userLevel;
        
        public function __construct($id, $email, $phone, $createdOn, $userLevel) {
            $this->id = $id;
            $this->email = $email;
            $this->phone = $phone;
            $this->createdOn = $createdOn;
            $this->userLevel = $userLevel;
        }
        
        public function getID() {
            return $this->id;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getPhone() {
            return $this->phone;
        }
        
        public function getCreatedOn() {
            return $this->createdOn;
        }
        
        public function getUserLevel() {
            return $this->userLevel;
        }
        
    }

    

?>
