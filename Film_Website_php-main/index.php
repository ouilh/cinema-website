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
   <link rel="icon_avatar" href="./assets/images/pic_acc.ico">
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
  
      else{include("header.php");}
  ?>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Movies tickets</p>

            <h1 class="h1 hero-title">
              Unlimited <strong>Movie</strong>.
            </h1>

            
             

            <button class="btn btn-primary" onclick="window.location='Movies.php'">
              <ion-icon name="play"></ion-icon>

              <span>Watch now</span>
            </button>

          </div>

        </div>
      </section>





<!-- 
  - #UPCOMING
-->
<?php
 
  include("cnx.php");

?>

<section class="upcoming">
  <div class="container">

    <div class="flex-wrapper">

      <div class="title-wrapper">
        <p class="section-subtitle">Movies</p>

        <h2 class="h2 section-title">This year Movies</h2>
      </div>
    
      <ul class="filter-list">

        <?php 
        $sql="select libelle from genre";
     
        $t=$conx->query($sql);
         while($row=$t->fetch(PDO::FETCH_ASSOC)){
      ?>
        <li>
          <button  onclick="send('<?php echo $row['libelle']; ?>')"   class=" filter-btn"><?php echo $row['libelle']; ?></button>
        </li>
        <?php } ?>
        <li>
          <button  onclick="send('All')"  class=" filter-btn">All</button>
        </li>
        
      </ul>
      
      
     
    </div>
    <script>
      function send(value) {

    $.ajax({
    method: 'POST',
    url: 'script.php',
    data: { option: value },
    success: function(data) {
      var container = document.getElementById('filter1');
      container.innerHTML =data;
    }
  });
}
  
</script>
<div id="filter1"><ul  class="movies-list  has-scrollbar"><?php
$sql="select * from film where annee >= year(CURRENT_DATE ()) ";
     
     $t=$conx->query($sql);
      while($row=$t->fetch(PDO::FETCH_ASSOC)){
   ?>
   

     <li>
       <div id="content" class="movie-card">

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

             <time datetime="PT137M"><?php echo $row["duré"] ?> min</time>
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
 
      
     

      

    

  </div>
</section>





      <!-- 
        - #SERVICE
      -->

      <section class="service">
        <div class="container">

          <div class="service-banner">
            <figure>
              <img src="./assets/images/service-banner.jpg" alt="HD 4k resolution! only $3.99">
            </figure>

            
          </div>

          <div class="service-content">

            <p class="service-subtitle">Our Services</p>

            <h2 class="h2 service-title">choose your favorite movies and look your ticket in cinema here.</h2>

            <p class="service-text">
              Our website will you can easily buy a ticket to watch your favorite mivies in cinema. 
              Register now and charge your account balance.
              And Enjoy the best movies.
            </p>

            <ul class="service-list">

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <img src="" alt="">
                    <ion-icon name="tv"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Yassine Ouialane .</h3>

                    <p class="card-text">
                     student Pro License LP SIAD FSR.
                    </p>
                  </div>

                </div>
              </li>

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="videocam"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Youssef belkhiraoui .</h3>

                    <p class="card-text">
                    student Pro License LP SIAD FSR.
                    </p>
                  </div>

                </div>
              </li>

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated">
        <div class="container">

          <p class="section-subtitle">Online Streaming</p>

          <h2 class="h2 section-title">Top Rated Movies</h2>
         

          <ul class="filter-list">

          <?php 
        $sql="select libelle from genre";
     
        $t=$conx->query($sql);
         while($row=$t->fetch(PDO::FETCH_ASSOC)){
      ?>
        <li>
          <button  onclick="send1('<?php echo $row['libelle']; ?>')"   class=" filter-btn"><?php echo $row['libelle']; ?></button>
        </li>
        <?php } ?>
        <li>
          <button  onclick="send1('All')"  class=" filter-btn">All</button>
        </li>

          </ul>
          <script>
      function send1(value) {

    $.ajax({
    method: 'POST',
    url: 'script2.php',
    data: { option: value },
    success: function(data) {
      var container = document.getElementById('filter2');
      container.innerHTML =data;
    }
  });
}
</script>
  

          <div id="filter2">
          <ul class="movies-list">
          <?php
            $sql="select * from film order by star Desc";
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

                    <time datetime="PT122M"><?php echo $row["duré"] ?> min</time>
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
        </div>
      </section>





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