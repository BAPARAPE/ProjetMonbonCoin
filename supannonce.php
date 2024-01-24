<?php
$id= mysqli_connect("localhost","root","","monboncoin");
$vid = $_GET["vid"];
$req = "delete from voiture  where vid = $vid";
mysqli_query($id, $req);
$req2 = "delete  from message where id_annonce=$vid";
mysqli_query($id, $req2);
$req3 = "delete from favoris where vid =$vid";
mysqli_query($id, $req3);
echo "Cette annonce a été supprimé de la base ainsi que tous les messages relié à cette annonce.<br>Vous allez être redirigé...";
header("refresh:3;url=Mesannonces.php");
?>
