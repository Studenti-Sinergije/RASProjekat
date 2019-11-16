<?php

    require_once("includes/database.php");

    class Category {
        
        private $id;
        private $name;
        private $image;
        
        public function __construct($id, $name, $image) {
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
        }
        
        public function getID() {
            return $this->id;
        }
        
        public function getName() {
            return $this->name;
        }
        
        public function getImage() {
            return $this->image;
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
                    $category = new Category($row["ID"], $row["name"], $row["image"]);
                    
                    $indx = $category->getID();
                    
                    $this->list[$indx] = $category;
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
