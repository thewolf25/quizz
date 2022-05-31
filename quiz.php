<!doctype html>

<html>

<head> 

<meta charset="utf-8">

<?php

if(!isset($_SESSION)){

    session_start();

}



require('./wp-includes/php/cnx.php');

//recuperation variable session  

$num_quiz = $_SESSION["index_quiz"];

//echo ("le numero de quiz est : ".$num_quiz);

$num_medecin=$_SESSION['index_medecin'];

//$num_question = $_SESSION['index_question'];



//$nbr_question = htmlspecialchars(trim($_GET['nbr_question']));

///// Recuperer les information du question demander 

//$sql_question="SELECT * FROM question where active='1'";

//			$question=mysqli_query($con,$sql_question);

//			$row_question = mysqli_fetch_array($question);

?>

<link rel='stylesheet' id='sage/main.css-css'  href='./wp-content/themes/alfasigma/dist/styles/main_51e3ed8c.css' type='text/css' media='all' />

<title>Alfasigma App - Tunisie</title>

</head>

<body>

   <header class="header-primary">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

              <nav class="navbar navbar-expand-lg navbar-light px-0">

                <div class="logo"> <a class="navbar-brand" href="https://www.alfasigma.com/"><img src="./wp-includes/themes/images/logo-alfasigma.png"

                                 alt="Logo Alfasigma" title="Home Page"></a></div>

              </nav>

            </div>

        </div>

    </div>

</header>

<main class="main">

      

      <br><br><br>

       <form action="./presentation2.php" name="fquiz" method="get">

      <fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 50%; margin:  0px auto;border:2px solid #666;

    -moz-border-radius:8px;

    -webkit-border-radius:8px;	

    border-radius:8px;">

      		<legend style="color: #00F;">Quiz n°: <?php echo $num_quiz ?> </legend> <!-- Titre du fieldset -->

            <!--<input type="text" name="login" id="login"/ autofocus required>-->

            <b> Bienvenue à notre Quiz </b><br><br>

            <p>Vous avez trois tentative pour repodre corectement au question<p><br>

            <p> Si vous actualiser la page, vous perdez une tentative</p><br>

            <p> Pour afficher les question vous devez cliqué sur Quiz.</p><br>

            <p style="color:red"> Merci, il faut valider la reponse avant l'expiration du temps accorder.</p><br>	

        <br>

        <input class="hamburger hamburger--collapse is-active pr-0" id="b_submit" type="submit" style="float:right; color: #00F; font-size:16px; text-decoration: underline;" value="Démarrer">

        <br><hr>

      	

      </fieldset>

      

       </form>

     

      </main>   

            </br>

      </br>

      </br>

<footer class="content-info py-5" id="footer">

	<a href="http://www.supinformatique.com" class="mr-2" target="_blank" rel="noopener"><p>© 2018 <font color="#999999">Sup</font><font color="red">I</font>nformatique</p></a> 

</footer>      

</body>

</html>