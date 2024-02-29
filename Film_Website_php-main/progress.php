<!DOCTYPE html>
<html lang="en">
<?php 
  session_start();
 
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   <link rel="shortcut icon" href="ressource/artl-first-A.png" type="image/x-icon">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
   <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- Favicons -->
   <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
   <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
   <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
   <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
   <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
   <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
   <meta name="theme-color" content="#7952b3">
  <title>Movies tickets</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo.svg" type="image/x-icon">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <?php
   
    if(isset($_SESSION['user'])){ include("header_login.php");}
  
      else{include("header.php");include("cnx.php");}
  ?>





  <main>
    <article>

     
<br/><br/><br/><br/>

      <!-- 
        - #Screening in progress
      -->

      <section class="tv-series">
        <div class="container">

          <p class="section-subtitle">MOVIES</p>

          <h2 class="h2 section-title">screening in progress</h2>

          <ul class="movies-list">
          <?php
            $sql="select * from film where est_en_cours_de_projection = 1";
            $t=$conx->query($sql);
             while($row=$t->fetch(PDO::FETCH_ASSOC)){
          ?>

            <li>
              <div class="movie-card">

              <a href="./movie-details.php?ref=<?php echo $row["titre"] ?>&id=<?php echo $row["idFilm"] ?>">
                  <figure class="card-banner">
                  <?php if($row["photo_600x900"]==null){ ?><img  alt="film_img" ><?php }else{echo '<img  src="data:image;base64,'.base64_encode($row["photo_600x900"]).'"/>'; } ?>
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.php">
                    <h3 class="card-title"><?php echo $row["titre"] ?></h3>
                  </a>

                  <time datetime="2022"><?php echo $row["annee"] ?></time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline"><?php echo $row["quality"] ?></div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT47M"><?php echo $row["duré"] ?> min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data><?php echo $row["star"] ?></data>
                  </div>
                </div>

              </div>
            </li>
            <?php }?>
            
          </ul>

        </div>
      </section>





     



  <!-- 
    - #FOOTER
  -->

 <?php
 include("footer.php");
 ?>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>