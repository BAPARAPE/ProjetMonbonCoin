<?php
    session_start();
    $id=mysqli_connect("localhost","root","","monboncoin");
    
    if(!isset($_SESSION["mail"])){
        header("location:connexion.php");
    }
    $mail = $_SESSION["mail"];
    $nom = $_SESSION["nom"];
    $uid = $_SESSION["uid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="deptannoncstyle.css">
    
</head>
<body>
<div class="container">
        <div class="header">
            <h2>Déposer une annonce</h2>
        </div>
        <form method="post" class="formulaire" enctype="multipart/form-data">
            <div class="form-control">
                <label for="">Nom-Modèle</label>
                <input type="text" name="Nomm"  required>
            </div>
            <div class="form-control">
                <label for="">En Vente ou En Location?</label>
                <select  name="Venlo">
                <option value=""> </option>
                    <?php
                        $res2 = mysqli_query($id, "select * from voiture order by Venlo");
                        while($ligne = mysqli_fetch_assoc($res2)){
                            echo "<option value='".$ligne["Venlo"]."'>".$ligne["Venlo"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="desc">
                <label for="">Description</label>
                <input type="text" name="Descrip" class="desc" required>
            </div>
            <div class="form-control">
                <label for="">Prix</label>
                <input type="number" name="Prix"  required>
            </div>
            <div class="form-control">
                <label for="">Ville</label>
                <input type="text" name="Ville"  required>
            </div>
            <div class="form-control">
              <label for="">Photo</label>
              <input type="file" name="image">
            </div>
            <button type="submit" name="bouton">Valider</button>
        </form>
    </div>

    <?php
     
        
     if (isset($_POST["bouton"])) {
         //var_dump($_POST);
        //$image = $Modele.$ext ; $Modele.$ext
        //var_dump($_FILES); 
        //echo $_FILES["image"]["Modele"]."<br>";  ["Modele"]
        $pos = strpos($_FILES["image"]["name"], ".");
        
        $ext = substr($_FILES["image"]["name"], $pos);
        
        $Nomm = $_POST["Nomm"];
        $Venlo = $_POST["Venlo"];
        $Descrip = $_POST["Descrip"];
        $Prix = $_POST["Prix"];
        $Ville = $_POST["Ville"];
        $uid = $_SESSION["uid"];
        $image = $Nomm.$ext;
        move_uploaded_file($_FILES["image"]["tmp_name"], "Photo/".$Nomm.$ext);
        $req = "insert into voiture values (vid,'$uid','$Nomm','$Venlo','$Descrip','$Prix','$Ville','$image')";
        mysqli_query($id, $req);
        echo"Annonce Ajoutéé";
         header("location:action.php");
        }
    ?>
</body>
</html>