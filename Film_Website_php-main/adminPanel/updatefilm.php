<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Film</title>
  <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../assets/css/form.css">

</head>

<body>

<?php 
session_start();
if(!isset($_SESSION['admin'])){
  header("Location:loginadmin.php");
}

include('../cnx.php');
$data = $conx->query("select idGenre ,libelle from genre")->fetchAll();

$film = $conx->query("select titre , idFilm ,annee ,duré ,resume ,quality from film where idFilm = {$_REQUEST['idFilm']}")->fetch();

?>


  <div class="row">
    <div class="col-md-12">
      <div class="r">
        <h1> Update Film </h1>

        <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==1){echo " <p class='seccssufuly'>Film has been Modified</p>" ;}}?>   
        <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==0){echo " <p class='err'>Error Please Try Againe</p>" ;}}?>   
      
<form action="updatefilmaction.php"   enctype="multipart/form-data" method="POST">
        <fieldset>
          <label for="name">titre:</label>
          <input type="text" id="name" value="<?php $film["titre"] ?>" name="titre">

          <label for="email">annee :</label>
          <input type="number" id="mail" value="<?php $film["annee"] ?>"  name="annee">

          <label for="email">duré :</label>
          <input type="number" id="mail" value="<?php $film["duré"] ?>" name="duré">

          <label for="email">resume :</label>
          <input type="text" id="mail" value="<?php $film["resume"] ?>" name="resume">

          <label for="email">quality :</label>
          <input type="text" id="mail" value="<?php $film["quality"] ?>" name="quality">

          <input hidden name="idFilm" value="<?php echo $_REQUEST["idFilm"] ?>" />



          <label>Genre:</label>
<?php 
foreach($data as $ele){
?>
          <input type="radio" id="development" value="<?php echo $ele["idGenre"]; ?>" name="Genre">
          <label class="light" for="development"><?php echo $ele["libelle"]; ?></label><br>
          <?php 
}
?>
<label>cours de projection:</label>
         <input type="radio" id="development" value="1" name="est_en_cours_de_projection">
         <label class="light" for="development">Yes</label><br>

         <input type="radio" id="development" value="0" name="est_en_cours_de_projection">
         <label class="light" for="development">No</label><br>
          



        </fieldset>
       

      
<div style="text-align: center;" class="btsn">  <input class="inpt" type="submit"  value="Update film"/> </div>
      
        </form>
      </div>
    </div>
  </div>

</body>

</html>