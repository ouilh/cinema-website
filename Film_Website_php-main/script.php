<ul  class="movies-list  has-scrollbar">
    <?php
    include("cnx.php");
   
        $option = $_POST['option'];
    
    
    
     // Build the SQL query based on the filter option
     if ($option == 'Action') { $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Action')";
     }
     elseif($option == 'Adventure'){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Adventure')";}
    elseif($option == 'Anime'){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Anime')";}
    elseif($option == 'Comedy'){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Comedy')";}
    elseif($option == 'Drama'){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Drama')";}
    elseif($option == 'Thriller'){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Thriller')";}
    elseif($option == 'Sci-Fi'){ $sql="select * from film where annee >= year(CURRENT_DATE ()) and idGenre in(select  idGenre from genre where libelle = 'Sci-Fi')";}
    elseif($option == 'All'){ $sql="select * from film where annee >= year(CURRENT_DATE ())";}
    else{$sql="select * from film where annee >= year(CURRENT_DATE ()) ";}
     
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