<?php
  session_start();
  $mail = $_SESSION["mail"];
  $nom = $_SESSION["nom"];
  $uid = $_SESSION["uid"];
  $id=mysqli_connect("localhost","root","","monboncoin");
  $req= "select * from voiture INNER JOIN user on voiture.uid = user.uid where user.uid=$uid";
  $res= mysqli_query($id,$req);
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styl.css">
   
    
</head>
<body>
<nav class="navbar cc-navbar navbar-expand-lg bg-body-tertiary px-4 mb-5 position-fixed my-0 fs-4 ">
       <div class="container-fluid">
          <a class="navbar-brand nav-section" href="action.php">MonbonCoin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
              <li class="nav-item pt-3 pe-4">
                <a class="btn btn-annonce rounded-0" href="depotannonce.php"><i class="fa-regular fa-square-plus pe-2"></i>Déposer une annonce</a>
              </li>
              

              <li class="nav-item">
                <a class="nav-link icon" href="Mesfavoris.php"><i class="fa-regular fa-1.5x ps-3 fa-heart"></i><br>Favoris</a>
              </li>
              <li class="nav-item">
                <a class="nav-link icon" href="chat.php"><i class="fa-solid fa-message ps-4"></i><br>Messages</a>
              </li>
             
            </ul>
            <form class="d-flex me-2" role="search">
              <input class="form-control me-2" type="search" aria-label="Search">
              <button class="btn btn-outline-success btn-annonce" type="submit">Rechercher</button>
            </form> 
            <ul class="navbar-nav  mb-2 mb-lg-0">
              <li class="nav-item">
                    <a class="nav-link icon active" aria-current="page" href="deconnexion.php"><i class="fa-solid fa-right-from-bracket ps-4"></i><br>Deconnexion</a>
              </li>
            </ul>
          </div>
        </div>
  </nav>

  <section class="containe">
    <div class="able">
     <h2 class="bizarre">Vos annonces</h2>
    </div>
  </section>

  <?php 
    while ($ligne=mysqli_fetch_assoc($res)): {
        $vid=$ligne["vid"];

      $Nomm=$ligne["Nomm"];
      $Venlo=$ligne["Venlo"];
      $image=$ligne["image"];
      $Prix=$ligne["Prix"];
      $Ville=$ligne["Ville"];
      $Descrip=$ligne["Descrip"];
    }
  ?>
    <section class="available ">
      <div class="container">
        
        <div class="card mb-3 border-0 rounded-0">
            <div class="row">
              <div class="col-md-5">
                <img src="<?="Photo
                
                
                /".$image?>" class="img-fluid rounded-0" alt="...">
              </div>
              <div class="col-md-4">
                <div class="card-body ">
                <h2 class="card-title "><a class="nom" href='details.php?vid=<?=$vid?>'><?=$Nomm?></a></h2>
                  
                  <p class="card-text fs-4 "><?=$Descrip ?></p>
                  <h4 class="card-title"><?=$Prix ?>$</h4>
                  <a href='modifannonce.php?vid=<?=$vid?>'> <i class="fa-solid fase fa-2x fa-pen-to-square"></i></a>
                  
                  <button onclick="return confirm('Voulez vous supprimé cette annonce?')" type="submit" name="supp"><a href='supannonce.php?vid=<?=$vid?>'> <i class="fa-solid fase-2 fa-2x fa-trash"></i> </a></button>
                  
                  <p class="card-text"><small class="text-muted"><?=$Ville ?></small></p>
                </div>
              </div>
            </div>
        </div>
      
      </div>
    </section>
  <?php endwhile ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <?php include 'footer.php'; ?>  
</body>
</html>