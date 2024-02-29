<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/completebuy.css'>
	
    <script src='main.js'></script>
</head>
<body>

<?php
include('../cnx.php');


session_start();

$titre = $conx->query("select titre , price from film where idFilm =".$_REQUEST['idfilm'])->fetch();
$programme = $conx->query("select heure_debut , num_salle from programme where idFilm =".$_REQUEST['idfilm'])->fetch();
$sold = $conx->query("select sold , email from user where  user ='{$_SESSION['user']}'")->fetch();
$adresse = $conx->query("select adresse from user where  user ='{$_SESSION['user']}'")->fetch();



?>

<header>
	<div class="container">
	</div>
</header>

<main class="form">
	<div class="container">

		<section class="thankyou">
			<h1>A great big thank you!</h1>

			<p>
				Welcome to the Take Command Health family! We'll take it from here.<br />
				We've sent a confirmation email to <strong><?php echo $sold['email']?></strong>
			</p>
		</section>

		<div class="row">

			<div class="details">

				<h3>Details</h3>

				<p>
					You purchased the <strong><?php echo $titre['titre']?></strong><br />
					You will be charged <strong>$<?php echo $titre['price']?></strong>
				</p>

				

				<div class="content-box">
					<h4 class="content-box-title">Programme Info</h4>
					<address>
					 SALLE NUMBER :	<?php echo $programme["num_salle"] ?>  <br />
					 START HOURSE :	<?php echo $programme["heure_debut"] ?><br />
					
					</address>
				</div>

				<div class="content-box">
					<h4 class="content-box-title">Payment Method</h4>
					<div class="payment-card amex">Your Balance </div>
				</div>

				<dl class="cf">
					<dt>Price</dt>
					<dd>$<?php echo $titre['price']?></dd>
                  
					<dt class="big">Your new balance</dt>
					<dd class="big">$<?php echo $sold['sold']?></dd>

				</dl>

			</div>

		

				

	</div>
</main>


<button id="create_pdf" class="button">Download the receipt</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<script>
$(document).ready(function () {  
    var form = $('.form'),  
    cache_width = form.width(),  
    a4 = [595.28, 841.89]; // for a4 size paper width and height  

    $('#create_pdf').on('click', function () {  
        $('body').scrollTop(0);  
        createPDF();  
    });  
    
    function createPDF() {  
        getCanvas().then(function (canvas) {  
            var  
             img = canvas.toDataURL("image/png"),  
             doc = new jsPDF({  
                 unit: 'px',  
                 format: 'a4'  
             });  
            doc.addImage(img, 'JPEG', 20, 20);  
            doc.save('receipt.pdf');  
            form.width(cache_width);  
        });  
    }  
      
    function getCanvas() {  
        form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
        return html2canvas(form, {  
            imageTimeout: 2000,  
            removeContainer: true  
        });  
    }
});
</script>


</body>
</html>