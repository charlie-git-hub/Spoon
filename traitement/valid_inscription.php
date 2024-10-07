<?php
require('login.php');

try{
    $mabd = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME.';charset=UTF8;', $USER, $PASSWORD);    $mabd->query('SET NAMES utf8;');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
if(isset($_POST['valid'])){
    $nickname = htmlspecialchars($_POST['nickname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $date = date('Y-m-d H:i:s');

    $req = $mabd->prepare('INSERT INTO user(user_nickname, user_mail, user_password_hash, user_date_create) VALUES(:nickname, :mail, :password, :date)');
    $req->execute(array(
        'nickname' => $nickname,
        'mail' => $mail,
        'password' => $password,
        'date' => $date
    ));
    $reponse = $req->fetch(PDO::FETCH_ASSOC);
    var_dump($reponse);
}    
?>