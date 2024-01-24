<?php
$id= mysqli_connect("localhost","root","","monboncoin");

if(isset($_POST["bout"])){
    $vid = $_POST["vid"];
    $Nomm = $_POST["Nomm"];
    $Venlo = $_POST["Venlo"];
    $Descrip = $_POST["Descrip"];
    $Prix = $_POST["Prix"];
    $Ville = $_POST["Ville"];
    $req = " Update voiture SET Nomm='$Nomm',
                                Venlo='$Venlo',
                                Descrip='$Descrip',
                                Prix='$Prix',
                                Ville='$Ville',
            where vid= $vid";
    $res= mysqli_query($id, $req);
    echo "Modifications éffectués.<br>Vous allez être redirigé...";
    header("refresh:3;url=action.php");
}


$vid = $_GET["vid"];

$req1 = "select * from voiture where vid=$vid ";
$res1 = mysqli_query($id, $req1);
$ligne = mysqli_fetch_assoc($res1);
$Nomm = $ligne["Nomm"];
$Venlo = $ligne["Venlo"];
$Descrip = $ligne["Descrip"];
$Prix = $ligne["Prix"];
$Ville = $ligne["Ville"];
$image = $ligne["image"];

?>
<!DOCTYPE html>
<html lang="fr">
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
            <h2>Modifier l'annonce</h2>
        </div>
        <form method="post" class="formulaire"  enctype="multipart/form-data">
            <div class="form-control">
                <label for="">Nom-Modèle</label>
                <input type="text" name="Nomm" value="<?=$Nomm?>" placeholder="<?=$Nomm?>" required>
            </div>
            <input type="hidden" name="vid" value="<?=$vid?>">
            <div class="form-control">
       
            <label for="">En Vente ou En Location?</label>
                <select  name="Venlo">
                <option value="<?=$Venlo?>"><?=$Venlo?></option>
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
                <input type="text" name="Descrip" class="desc" value="<?=$Descrip?>" placeholder="<?=$Descrip?>" required>
            </div>
            <div class="form-control">
                <label for="">Prix</label>
                <input type="number" name="Prix" value="<?=$Prix?>" placeholder="<?=$Prix?>"  required>
            </div>
            <div class="form-control">
                <label for="">Ville</label>
                <input type="text" name="Ville" value="<?=$Ville?>" placeholder="<?=$Ville?>"  required>
            </div>
            <div class="form-control">
              <label for="">Photo</label>
              <input type="file" name="image">
            </div>
            <button onclick="return confirm('Voulez vous éffectués ces modifications?')" type="submit" name="bout">Modifier</button>
        </form>
    </div>    

</body>
</html>