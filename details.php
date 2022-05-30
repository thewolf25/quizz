<!doctype html>
<html>
<head> 
<!--<meta charset="utf-8">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if(!isset($_SESSION)){
    session_start();
}
require('./wp-includes/php/cnx.php');
//recuperation variable
//$num_quiz = htmlspecialchars(trim($_GET['q']));
//$num_question = htmlspecialchars(trim($_GET['nq']));

//variable session 
$num_quiz=$_SESSION['index_quiz'];
//recuperation variable index medecin
//initialisation numero de quiz
if(isset($_GET['idm'])){
	$index_med = htmlspecialchars(trim($_GET['idm']));	
}
?>

</script>
<link rel='stylesheet' id='sage/main.css-css'  href='./wp-content/themes/alfasigma/dist/styles/main_51e3ed8c.css' type='text/css' media='all' />
<style type="text/css">
#myProgress {
  width: 100%;
  background-color: grey;
}

#myBar {
  width: 1%;
  height: 5px;
  background-color: red;
}
textarea {
	font-size: .8rem;
	letter-spacing: 1px;
	max-width: 100%;
}
table {
	border:2px solid #666;
	border-radius:8px;
}
</style>
<title>Alfasigma App - Tunisie</title>
</head>
<body onLoad="move()">
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
   <!-- Recap Medecin -->
   <fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 500px; margin:  0px auto;border:2px solid #666;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;	
    border-radius:8px;">
    	<?php
    	// Recuperation information medecin
        	$sql_medecin="SELECT * FROM medecin where index_medecin='".$index_med."'";
			$medecin=mysqli_query($con,$sql_medecin);
			$row_medecin = mysqli_fetch_array($medecin);
		//Affichage texte
			echo"<b>Quiz numero: </b>".$num_quiz." <br><b>Nom: </b>".$row_medecin['nom']."<br><b>Prénom: </b>".$row_medecin['prenom']."<br><b>numero de tel: </b>".$row_medecin['num_tel']."<br>
			<b>mail: </b>".$row_medecin['mail']."<br>";
    	?>
    </fieldset><br><br><br>
    <!-- Les question -->
    <!--<fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 500px; margin:  0px auto;border:2px solid #666;
    -moz-border-radius:8px;
    -webkit-border-radius:8px;	
    border-radius:8px;">-->
    	<table align="center" width="75%" border="2px solid #666">
            <tr>
            	<th>Qestion</th>
            </tr>
            
    	<?php
    	// Recuperation information question
        	$sql_question="SELECT * FROM question where index_quiz='".$num_quiz."'";
			$question=mysqli_query($con,$sql_question);
			while ($row_question = mysqli_fetch_array($question)) { 
				echo "<tr><th>";
				echo $row_question['txt_question']."<br> Réponse : <br>";
				// Recuperation reponse
        				$sql_reponse="SELECT * FROM reponse where index_medecin='".$index_med."' and index_question='".$row_question['index_question']."'";
						$reponse=mysqli_query($con,$sql_reponse);
						$row_reponse = mysqli_fetch_array($reponse);
				
						
				if ($row_question['2']=="textarea"){
						
						echo "<font color='#00CC33'>".$row_reponse['Text_rep']."</font><br>";
				}
				else 
				{
					$sql_proposition="SELECT * FROM proposition WHERE index_question = '".$row_question['index_question']."'";
					$proposition=mysqli_query($con,$sql_proposition);
					
					while ($row_proposition = mysqli_fetch_array($proposition)) { 
						echo "*-".$row_proposition['intitule'];
						$sql_det_rep="SELECT * FROM det_rep where index_rep='".$row_reponse['index_rep']."' and index_proposition='"
						.$row_proposition['index_proposition']."'";
						$det_rep=mysqli_query($con,$sql_det_rep);
						$row_det_rep = mysqli_fetch_array($det_rep);
						if($row_det_rep['valeur']=="0"){
							echo ".......<font color='#00CC33'>Faux</font>";	
						}else{
							echo ".......<font color='#00CC33'>Vrais</font>";
						}
						echo"<br>";
					}
					echo"<br>";
				}
				
			     echo "</th></tr>";
			 }
    	?>
        </table>
    <!--</fieldset>-->

     
      </main>

      </br>
      </br>
      </br>
<footer class="content-info py-5" id="footer">
	<a href="http://www.supinformatique.com" class="mr-2" target="_blank" rel="noopener"><p>© 2018 <font color="#999999">Sup</font><font color="red">I</font>nformatique</p></a> 
</footer>      
</body>
</html>