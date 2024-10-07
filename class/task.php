<?php
require('login.php'); 

class Task {
    public $energie;
    public $difficulte;
    private $db; 
    public $id_task;

    public function __construct($energie, $difficulte, $db, $id_task) {
        $this->energie = $energie;
        $this->difficulte = $difficulte;
        $this->db = $db;
        $this->id_task = $id_task;
    }

    public function save() {
        try {
            $stmt = $this->db->prepare('INSERT INTO task (energie, difficulte, id_task) VALUES (:energie, :difficulte, :id_task)');
            $stmt->execute([
                ':energie' => $this->energie,
                ':difficulte' => $this->difficulte,
                ':id_task' => $this->id_task
            ]);

            $this->id_task = $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($id_task) {
        try {
            $req1 = $this->db->prepare('DELETE FROM task WHERE id_task = :id_task');
            $req1->execute([':id_task' => $id_task]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function update($id_task, $energie, $difficulte) {
        try {
            $req2 = $this->db->prepare('UPDATE task SET energie = :energie, difficulte = :difficulte WHERE id_task = :id_task');
            $req2->execute([
                ':energie' => $energie,
                ':difficulte' => $difficulte,
                ':id_task' => $id_task
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
