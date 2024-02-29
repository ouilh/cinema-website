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
$data = $conx->query("select titre , idFilm from film where idFilm = {$_REQUEST['id']}")->fetch();


?>


  <div class="row">
    <div class="col-md-12">
      <div class="r">
        <h1> Add Programme </h1>

        <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==1){echo " <p class='seccssufuly'>Film has been added</p>" ;}}?>   
        <?php if(isset($_REQUEST["ref"])){ if($_REQUEST["ref"]==0){echo " <p class='err'>Error Please Try Againe</p>" ;}}?>   
      
<form action="programmeAction.php"   enctype="multipart/form-data" method="POST">


<!-- Full texts
idProgramme	
idFilm	
heure_debut	
num_salle	
createdDate	
lastModifiedDate	 -->
        <fieldset>




        <label for="name">Titre:</label>
          <input disabled type="text" id="name" value="<?php echo $data["titre"] ?>" name="id">

          <input hidden type="text" id="name" value="<?php echo $data["idFilm"] ?>" name="idFilm">
          
        

          <label onchange="" for="name">heure_debut:</label>
          <input type="text" id="name" name="heure_debut">

          <label for="email">num_salle :</label>
          <input type="number" id="mail" name="num_salle">

          

         



        

        </fieldset>
        <fieldset>

        

        </fieldset>



      
<div style="text-align: center;" class="btsn">  <input class="inpt" type="submit"  value="Add Programme"/> </div>
      
        </form>
      </div>
    </div>
  </div>

</body>

</html>