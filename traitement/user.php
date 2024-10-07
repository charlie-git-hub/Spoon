<?php
class User{
    public $nom;
    public $prenom;
    public $email;
    public $password;
    private $db;
    public $pdp;
    public $id_user;
    public $pronoms;
}


public function __construct($nom, $prenom, $email, $password, $db, $pdp, $id_user, $pronoms) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->password = $password;
    $this->db = $db;
    $this->pdp = $pdp;
    $this->id_user = $id_user;
    $this->pronoms = $pronoms;
}


public function save() {
    try {
        $stmt = $this->db->prepare('INSERT INTO user (nom, prenom, email, password, pdp, id_user, pronoms) VALUES (:nom, :prenom, :email, :password, :pdp, :id_user, :pronoms)');
        $stmt->execute([
            ':nom' => $this->nom,
            ':prenom' => $this->prenom
            ':email' => $this->email,
            ':password' => $this->password,
            ':pdp' => $this->pdp,
            ':id_user' => $this->id_user,
            ':pronoms' => $this->pronoms
        ]);

        $this->id_user = $this->db->lastInsertId();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function delete($id_user) {
    try {
        $req1 = $this->db->prepare('DELETE FROM user WHERE id_user = :id_user');
        $req1->execute([':id_user' => $id_user]);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function update($nom, $prenom, $email, $password, $pdp, $id_user, $pronoms) {
    try {
        $req2 = $this->db->prepare('UPDATE user SET nom = :nom, prenom = :prenom, email = :email, password = :password, pdp = :pdp, pronoms = :pronoms WHERE id_user = :id_user');
        $req2->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':password' => $password,
            ':pdp' => $pdp,
            ':id_user' => $id_user,
            ':pronoms' => $pronoms
        ]);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
