<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="traitement/valid_inscription.php">
        <label for="nickname">Pseudo</label>
        <input type="text" name="nickname" id="nickname" require>
        <label for="mail">Email</label>
        <input type="mail" name="mail" id="mail" require>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" require>
        <!-- <label for="password_confirm">Confirmer le mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" require> -->
        <input type="submit" value="M'inscrire" name="valid">
    </form>
</body>
</html>