<?php
require_once 'Database.php';
class BaseModel {
    protected $table;
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Ajouter
    public function insert($data) {
        // Les colonnes de la table
        $columns = implode(',', array_keys($data));

        // Les valeurs à insérer
        $values = ':' . implode(', :', array_keys($data));

        // Requête SQL d'insertion
        $sql = "INSERT INTO $this->table($columns) VALUES($values)";

        // try {
            // Préparation de la requête
            $stmt = $this->db->prepare($sql);

            // Liaison des valeurs
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            // Exécution de la requête
            $result = $stmt->execute();

            // Fermeture du statement
            $stmt->closeCursor();

            return $result;
        }
        
        // Modifier
        public function update($data, $id) {
            $args = array();
            foreach ($data as $key => $value) {
                if ($key !== 'id') {
                    $args[] = "$key = :$key";
                }
            }
    
            $sql = "UPDATE $this->table SET " . implode(',', $args) . " WHERE id = :id";
            $stmt = $this->db->prepare($sql);
    
            if (!$stmt) {
                die("Error in prepared statement: " . $this->db->errorInfo()[2]);
            }
    
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(":id", $id);
    
            $result = $stmt->execute();
    
            $stmt->closeCursor();
    
            return $result;
        }

        // Supprimer 
        public function delete($id) {
            $sql = "DELETE FROM $this->table WHERE id = :id";
        
            $stmt = $this->db->prepare($sql);
        
            if (!$stmt) {
                die("Error in prepared statement: " . implode(' ', $this->db->errorInfo()));
            }
        
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
            $result = $stmt->execute();
        
            $stmt->closeCursor();
        
            return $result;
        }
        
        // Affichage 
        // public function read(int $id)
        // {
        // $query = "SELECT * FROM {$this->table} WHERE id = :id";
        // $stmt = $this->db->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // return $stmt->fetch(PDO::FETCH_ASSOC);
        // }
    }

