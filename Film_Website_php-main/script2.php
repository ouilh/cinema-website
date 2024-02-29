<ul  class="movies-list  ">
    <?php
    include("cnx.php");
   
        
        
    
    
    
    if(isset($_POST['option'])){
      $option = $_POST['option'];
      if ($option == 'Action') { $sql="select * from film where  idGenre in(select  idGenre from genre where libelle = 'Action')";}
      elseif($option == 'Adventure'){ $sql="select * from film where idGenre in(select  idGenre from genre where libelle = 'Adventure') order by star Desc";}
     elseif($option == 'Anime'){ $sql="select * from film where  idGenre in(select  idGenre from genre where libelle = 'Anime') order by star Desc";}
     elseif($option == 'Comedy'){ $sql="select * from film where  idGenre in(select  idGenre from genre where libelle = 'Comedy') order by star Desc";}
     elseif($option == 'Drama'){ $sql="select * from film where  idGenre in(select  idGenre from genre where libelle = 'Drama') order by star Desc";}
     elseif($option == 'Thriller'){ $sql="select * from film where  idGenre in(select  idGenre from genre where libelle = 'Thriller') order by star Desc";}
     elseif($option == 'Sci-Fi'){ $sql="select * from film where  idGenre in(select  idGenre from genre where libelle = 'Sci-Fi') order by star Desc";}
     elseif($option == 'All'){ $sql="select * from film  order by star Desc";}
     else{ $sql="select * from film where left(titre,LENGTH('{$option}'))='{$option}' order by star Desc";}
    }
    
     // Build the SQL query based on the filter option
    
     
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