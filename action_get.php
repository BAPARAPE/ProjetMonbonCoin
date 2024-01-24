<?php
session_start();
$id= mysqli_connect("localhost","root","","monboncoin");
$vid= $_GET["vid"];

$req1 = "select * from voiture where vid=$vid ";
$res1 = mysqli_query($id, $req1);
$ligne = mysqli_fetch_assoc($res1);
$Nomm = $ligne["Nomm"];
$Venlo = $ligne["Venlo"];
$Descrip = $ligne["Descrip"];
$Prix = $ligne["Prix"];
$Ville = $ligne["Ville"];
$image = $ligne["image"];


$uid= $_SESSION["uid"];
$req="INSERT INTO favoris VALUES (null,'$uid','$vid',now(),'$Nomm','$Venlo','$Descrip','$Prix','$Ville','$image')";
mysqli_query($id,$req);
header("refresh:1;url=Mesfavoris.php");



?>