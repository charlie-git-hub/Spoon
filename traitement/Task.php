<?php
require('login.php'); 

class Task {
    public $energie;
    public $difficulte;
    private $db; 

    public function __construct($energie, $difficulte, $db) {
        $this->energie = $energie;
        $this->difficulte = $difficulte;
        $this->db = $db; 
    }

    public function save() {
        try {
            $stmt = $this->db->prepare('INSERT INTO tache (energie, difficulte) VALUES (:energie, :difficulte)');
            $stmt->execute([
                ':energie' => $this->energie,
                ':difficulte' => $this->difficulte
            ]);

            $this->id_tache = $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($id_tache) {
        try {
            $req1 = $this->db->prepare('DELETE FROM tache WHERE id_tache = :id_tache');
            $req1->execute([':id_tache' => $id_tache]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function update($id_tache, $energie, $difficulte) {
        try {
            $req2 = $this->db->prepare('UPDATE tache SET energie = :energie, difficulte = :difficulte WHERE id_tache = :id_tache');
            $req2->execute([
                ':energie' => $energie,
                ':difficulte' => $difficulte,
                ':id_tache' => $id_tache
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
