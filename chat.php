<?php
session_start();
if(!isset($_SESSION["mail"])){
    header("location:connexion.php");
}
$mail = $_SESSION["mail"];
$nom = $_SESSION["nom"];

$id = mysqli_connect("localhost","root","","monboncoin");
if(isset($_POST["bout"])){
    $destinataire = $_POST["destinataire"];
    $message = $_POST["message"];
    $vid = $_GET["vid"];
    // $req = "insert into message values (null, '$vid', '$nom','$destinataire', '$message', now())";
    $req = "INSERT INTO message(id_annonce, nom, destinataire, message, date) 
    VALUES ('$vid','$nom' ,'$destinataire','$message',now())";
    mysqli_query($id, $req);
}
//echo var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylem.css">
</head>
<body>
    <div class="container">
        <header><h1>Bonjour <?=$nom?>, Vos messages
       <!-- <a href="deconnexion.php"><img src="quitter.png" width="30"></a></h1></header>-->
        <div class="messages">
            <ul>
                <?php
                
                $req = "select * from message join voiture on message.id_annonce=voiture.vid
                        where destinataire = '$nom'
                        or destinataire = 'tous'
                        order by date desc";
                $res = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($res)){
                    echo "<li class='message'>".
                                            $ligne["date"]." - ".
                                            $ligne["id_annonce"]." - ".
                                            $ligne["nom"]." - ".
                                            $ligne["message"]. 
                        "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                
                <input type="text" name="message" placeholder="Message : " required>
                <select name="destinataire">
                    <option value="tous">Tous</option>
                    <?php
                        $res = mysqli_query($id, "select distinct nom from user");
                        while($ligne = mysqli_fetch_assoc($res)){
                            echo "<option value='".$ligne["nom"]."'>".$ligne["nom"]."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Envoyer" name="bout">
            </form>
        </div>
    </div>
</body>
</html>