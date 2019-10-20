<?php

    require_once("includes/database.php");

    class Category {
        
        private $id;
        private $name;
        
        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }
        
        public function getID() {
            return $this->id;
        }
        
        public function getName() {
            return $this->name;
        }
        
    }

    class CategoryList {
        
        private static $instance = null;
        
        private $list;
        
        private function __construct() {
            $this->list = array();
            
            $database = Database::getInstance();
            $connection = $database->getConnection();
            
            $query = "SELECT * FROM categories";
            $result = $connection->query($query);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category = new Category($row["ID"], $row["name"]);
                    
                    $indx = $category->getID();
                    $name = $category->getName();
                    
                    $this->list[$indx] = $name;
                }
            }
        }
        
        public function getCategories() {
            return $this->list;
        }
        
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new CategoryList();
            }
            
            return self::$instance;
        }
        
    }

?>
