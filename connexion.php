<?php
session_start();
$id= mysqli_connect("localhost","root","","monboncoin");
if (isset($_POST["bout"])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $criptmdp= md5($mdp);
    $req = "select * from user where mail='$mail' and criptmdp = '$criptmdp'";
    $res = mysqli_query($id, $req);
    if (mysqli_num_rows($res)==1) {
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["uid"] = $ligne["uid"];
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["mail"] = $mail;
        $//tel = $_SESSION["tel"];
       // $_SESSION["mdp"] = $mdp;
        $succes= "Connexion réussie";
        header("location:action.php");

    }else{
        $erreur = "Erreur de login ou de mot de passe...";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Connexion</h2>
        </div>
        <form method="post" class="formulaire" id="form">
            <div class="form-control">
                <label for="">Adresse Mail</label>
                <input type="email" name="mail" id="mail" placeholder="nom@gmail.com">
            </div>      
            <div class="form-control">
                <label for="">Mot de passe</label>
                <input type="mdp" name="mdp" id="mdp">
            </div>
            <?php if(isset($succes)) echo "<small>$succes</small>";?>
            <?php if(isset($erreur))  echo "<b>$erreur</b>";?>

            <button type="submit" name="bout">Connexion</button>  
            
            <p>Vous n'avez pas de compte? <a href="Inscription.php">Inscrivez Vous</a></p>
        </form>
    
   </div> 
</body>
</html>