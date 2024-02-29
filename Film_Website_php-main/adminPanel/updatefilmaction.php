<?php 

session_start();
if(!isset($_SESSION['admin'])){
  header("Location:loginadmin.php");
}

include('../cnx.php');

try{
   
  if(isset($_POST["Genre"]) && isset($_POST["titre"]) && isset($_POST["annee"]) && isset($_POST["duré"]) && isset($_POST["resume"]) &&
  isset($_POST["quality"] ) && isset( $_POST["est_en_cours_de_projection"]) && isset($_POST["idFilm"])){
        $Genre = $_POST["Genre"];
        $titre = $_POST["titre"];
        $annee = $_POST["annee"];
        $duré = $_POST["duré"];
        $resume = $_POST["resume"];
        $quality = $_POST["quality"];
        $est_en_cours_de_projection = $_POST["est_en_cours_de_projection"];
        $idfilm = $_POST["idFilm"];
        
       

        $sql = $conx->prepare('update film set idGenre = ?, titre = ?, annee = ?, duré = ?, resume = ?, quality = ?, est_en_cours_de_projection = ? 
         where idFilm ='.$idfilm);
        $sql->execute([$Genre,$titre,$annee,$duré,$resume,$quality,$est_en_cours_de_projection]);
    
        $secc = 1;
        header("Location:index.php?ref=$secc");
  }else{
   
    $err = 0;
    header("Location:index.php?ref=$err");
  }
    
       
 

}catch(Exception $e){
  echo $e;
   $err = 0;

    header("Location:edituser.php?ref=$err");
}





?>

