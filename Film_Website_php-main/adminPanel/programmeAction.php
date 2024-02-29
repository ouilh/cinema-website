<?php 

session_start();

if(!isset($_SESSION['admin'])){
  header("Location:loginadmin.php");
}

include('../cnx.php');

try{
//   idProgramme	
// idFilm	
// heure_debut	
// num_salle	
// createdDate	
// lastModifiedDate
    if(isset($_POST["idFilm"]) && isset($_POST["heure_debut"]) && isset($_POST["num_salle"])){
        $idFilm = $_POST["heure_debut"];
        $num_salle = $_POST["num_salle"];
        $idFilm = $_POST["idFilm"];
       
      

        $sql = $conx->prepare('insert INTO programme(heure_debut, num_salle, idFilm)

        VALUES(?,?,?)');
        $sql->execute([$idFilm,$num_salle,$idFilm]);
   
        $secc = 1;
        header("Location:index.php?id=$secc");
     
    }else{
        $error = 0;
         header("Location:addprogramme.php?ref=$error");
    }
       
 

}catch(Exception $e){

    header("Location:addprogramme.php?ref=$e");
}





?>

