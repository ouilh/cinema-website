<?php
include("cnx.php");
session_start();
$first_n=$_POST["First_name"];
$last_n=$_POST["Last_name"];
$number=$_POST["number"];
$adresse=$_POST["adresse"];
$pic=file_get_contents($_FILES["pic"]["tmp_name"]);
$sql="update user set adresse= '{$adresse}',tel={$number}, last_name='{$last_n}',first_name='{$first_n}', profile_img='".addslashes($pic)."' where user = '".$_SESSION["user"]."'";
$l=$conx->query($sql);
if($l==TRUE){
    echo"<script> window.location = 'index.php'</script>";
}






?>