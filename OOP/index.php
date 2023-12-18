<?php
require "Model.php";
require "crudOOP.php";

class User extends Model {
    protected $table = 'users';
    public $id;
    public $name;
    public $age;
    public function __construct() {
        $this->db = crudOOP::getInstance()->getConnection();
    }
}

// Exemple d'utilisation
$user = new User();
$user->name = 'Merry Bal';
$user->age = 23;
$user->id = 6;

// Insertion
// $result = $user->insert(['name' => $user->name, 'age' => $user->age]);
// if ($result) {
//     echo "Insertion réussie!";
// } else {
//     echo "Erreur lors de l'insertion.";
// }

// delete
$result = $user->delete($user->id);


// affichage
// $resultSelect = $user->select(['name', 'age'], "name = 'Merry Bal'");
// if ($resultSelect) {
//     echo "Sélection réussie!";
//     while ($row = $resultSelect->fetch_assoc()) {
//         // Traiter les données sélectionnées
//         echo "Nom: " . $row['name'] . ", Age: " . $row['age'] . "<br>";
//     }
// } else {
//     echo "Erreur lors de la sélection.";
// }