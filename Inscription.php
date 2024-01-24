<?php
 $id= mysqli_connect("localhost","root","","monboncoin");
 if (isset($_POST["bouton"])) {
    $nom= $_POST["nom"];
    $mail= $_POST["mail"];
    $tel= $_POST["tel"];
    $mdp= $_POST["mdp"];
    $criptmdp= md5($mdp);
    $req1="select * from user where mail='$mail'"  ;
    $res1=mysqli_query($id,$req1);
    if (mysqli_num_rows($res1) > 0) {
        $erreur= "Ce mail existe déja, désolé";
    }else{
        $req2="insert into user values (null, '$nom','$mail','$tel','$criptmdp')";
        mysqli_query($id,$req2);
        $succes= "Inscription réussie";
        header("location:connexion.php");
    }
    
 }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <script>
        function checkInscription(){
            let reponse = true;
            ctrlMdp = document.getElementsByName('mdp')[0];
            if(ctrlMdp.value.length < 10){
                ctrlMdp.style = "border : solid 1px red";
                document.getElementById("errmdp").style = "font-size : 16px; color: red; display : inline";
                reponse = false;
            }
            else{
                ctrlMdp.style = "border : solid 1px black";
            }
            return reponse;
        }
    </script>
    
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Créer un Compte</h2>
        </div>
        <form method="post" class="formulaire" onsubmit="return checkInscription()">
            <div class="form-control">
                <label for="">Nom d'utilisateur</label>
                <input type="text" name="nom"  required>
            </div>
            <div class="form-control">
                <label for="">Adresse Mail</label>
                <input type="email" name="mail"  placeholder="nom@gmail.com" required>
            </div>
            <div class="form-control">
                <label for="">Numéro de Télephone</label>
                <input type="tel" name="tel"  placeholder="(+33) . .  . .  . .  . .  . .  . ." required>
            </div>
            <div class="form-control">
                <label for="">Mot de passe</label>
                <input type="mdp" name="mdp" id="mdp" required>
                <br/>
                <span id = "errmdp" style = 'display : none'>Le mot de passe est trop court</span>
            </div>
            <?php if(isset($erreur))  echo "<b>$erreur</b>";?>
            <?php if(isset($succes)) echo "<small>$succes</small>";?>
            <button type="submit" name="bouton"><i class="fas fa-user-plus"></i>S'inscrire</button>
        </form>
    </div>
</body>
</html>