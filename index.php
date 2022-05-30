<!doctype html>
<html>
<head> 
<meta charset="utf-8">
<?php
//require('./wp-includes/php/question.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['index_medecin'])){
	echo "<meta http-equiv='"."refresh'"."content='0;url=./presentation1.php"."'>";
}


$index_quiz = htmlspecialchars(trim($_GET['id']));
$_SESSION["index_quiz"]=$index_quiz;
require('./wp-includes/php/cnx.php');
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
      <br>
      <br>
      <p align="center">Bienvenue. Veuillez remplir ce formulaire avant de commencer le Quiz.</p>
       <form name="inscription" action="./wp-includes/php/inscription.php" methode="post">
      		<fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 500px; margin:  0px auto;border:2px solid #666;
    							-moz-border-radius:8px;
   								-webkit-border-radius:8px;border-radius:8px;">
      		<legend style="color: #00F;">Bienvenue au Quiz n°: <?php echo $index_quiz; ?></legend> <!-- Titre du fieldset -->
            <table align="center" width="100%">
            <tr>
            <td align="left">
            	<label for="nom"> Nom </label> :      	</td><td align="center">	<input type="text" name="nom" id="nom"/ autofocus required></td>
            </tr>
            <tr>
            <td align="left">
            	<label for="prenom"> Prénom </label> :    </td><td align="center">	<input type="text" name="prenom" id="prenom"/ required></td>
            </tr>
            <tr>
            <td align="left">
            	<label for="phone"> Téléphone </label> :    </td><td align="center">	<input type="tel" name="phone" id="phone"/ required></td>
        	
            </tr>
            <tr>
            <td align="left">
            	<label for="mail"> Email </label> :     </td><td align="center">	<input type="email" name="mail" id="mail"/ required></td>
        	
            </tr>
            </table>
            </br>
            </br>
        	<input type="submit" class="hamburger hamburger--collapse is-active pr-0" id="b_submit"  style="float:right; color: #00F; font-size:16px; text-decoration: underline;" value="Suivant">
        <br><hr>
      	
      </fieldset>
      
       </form>
     
      </main>

      </br>
      </br>
      </br>
<footer class="content-info py-5" id="footer">
	<a href="http://www.supinformatique.com" class="mr-2" target="_blank" rel="noopener"><p>© 2020 <font color="#999999">Sup</font><font color="red">I</font>nformatique</p></a> 
</footer>
</body>
</html>