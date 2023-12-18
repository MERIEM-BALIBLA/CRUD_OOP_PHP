<?php
require "crudOOP.php";
class Model {
    protected $table;
    protected $db;

    public function __construct() {
        $this->db = crudOOP::getInstance()->getConnection();
    }

    public function insert($data) {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $this->table($columns) VALUES($values)";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . $this->db->error);
        }

        $types = str_repeat('s', count($data));
        $params = array_values($data);
        $stmt->bind_param($types, ...$params);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }


    // Update function 
    // Update function 
public function update($data, $id) {
    $args = array();
    foreach ($data as $key => $value) {
        // Ne pas inclure l'ID dans les colonnes à mettre à jour
        if ($key !== 'id') {
            $args[] = "$key = ?";
        }
    }

    $sql = "UPDATE $this->table SET " . implode(',', $args) . " WHERE id = ?";

    $stmt = $this->db->prepare($sql);

    if (!$stmt) {
        die("Error in prepared statement: " . $this->db->error);
    }
    
    // $types = str_repeat('s', count($data) - 1) . 'i'; // 'i' pour le type entier (ID)
    $types = str_repeat('s', count($data) + 1); // 'i' pour le type entier (ID)

    $params = array_values($data);
    $params[] = $id;
    $stmt->bind_param($types, ...$params);

    $result = $stmt->execute();

    $stmt->close();

    return $result;
}

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . $this->db->error);
        }

        $stmt->bind_param('i', $id);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    public function select($columns = ["*"], $where = null) {
        if (!is_array($columns)) {
            $columns = [$columns]; // Convertir en tableau s'il ne l'est pas déjà
        }
    
        $columnsString = implode(', ', $columns);
        $sql = "SELECT $columnsString FROM $this->table";
    
        if ($where !== null) {
            $sql .= " WHERE $where";
        }
    
        $stmt = $this->db->prepare($sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . $this->db->error);
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        return $result;
    }
}

