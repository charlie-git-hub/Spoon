<?php
require('login.php'); 
class User
{
    public $nickname;
    public $email;
    public $password_hash;
    private $db;
    public $pdp;
    public $id_user;


    public function save()
    {
        try {
            $stmt = $this->db->prepare('INSERT INTO tache (nickname, email, password_hash, pdp, id_user) VALUES (:nom, :prenom, :email, :password_hash, :pdp, :id_user)');
            $stmt->execute([
                ':nickname' => $this->nickname,
                ':email' => $this->email,
                ':password_hash' => $this->password_hash,
                ':pdp' => $this->pdp,
                ':id_user' => $this->id_user
            ]);

            $this->id_user = $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete($id_user)
    {
        try {
            $req1 = $this->db->prepare('DELETE FROM user WHERE id_user = :id_user');
            $req1->execute([':id_user' => $id_user]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update($id_user, $nickname, $email, $password_hash, $pdp)
    {
        try {
            $req2 = $this->db->prepare('UPDATE user SET nickname = :nickname, email = :email, password_hash = :password_hash, pdp = :pdp WHERE id_user = :id_user');
            $req2->execute([
                ':nickname' => $nickname,
                ':email' => $email,
                ':password_hash' => $password_hash,
                ':pdp' => $pdp,
                ':id_user' => $id_user
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
