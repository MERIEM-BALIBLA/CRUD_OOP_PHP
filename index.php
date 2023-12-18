<?php
    require "Database.php";
    require "BaseModel.php";
    class User extends BaseModel {
        protected $table = 'users';
        public $id;
        public $name;
        public $age;
        public function __construct() {
            
            $this->db = Database::getInstance()->getConnection();
        }
    }

    // Exemple d'utilisation
    $user = new User();
    $user->name = 'chyppo';
    $user->age = 2;
    $user->id = 7;

    // Insertion
    // $result = $user->insert(['name' => $user->name, 'age' => $user->age]);
    // if ($result) {
    //     echo "Insertion réussie!";
    // } else {
    //     echo "Erreur lors de l'insertion.";
    // }

    $result = $user->update(['name' => $user->name, 'age' => $user->age], $user->id);

    // $result = $user->delete($user->id);

    
