<!doctype html>

<html>

<head> 

<meta charset="utf-8">

<?php

if(!isset($_SESSION)){

    session_start();

}



require('./wp-includes/php/cnx.php');

//initialisation numero de quiz

if(isset($_GET['id'])){

	$index_quiz = htmlspecialchars(trim($_GET['id']));

	$_SESSION["index_quiz"]=$index_quiz;

}else

{

	$index_quiz=$_SESSION["index_quiz"];

}



$sindex_medecin=$_SESSION["index_medecin"];

$snum_quiz=$_SESSION["index_quiz"];

$snum_question=$_SESSION["index_question"];

$snum_tenta=$_SESSION['nombre_tenta'];



	

//Calcule rresultat





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

      <p align="center"><b>Resultat pour le Quiz n°: <?php echo $index_quiz; ?></b></p>

      

    	<fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 80%; margin:  0px auto;border:2px solid #666;

    							-moz-border-radius:8px;

   								-webkit-border-radius:8px;border-radius:8px;">

            

            <?php

				

				//Calcule resultat 

				$sql_resultat="SELECT index_medecin,SUM(temp_rep),SUM(note),SUM(rep_val) FROM reponse where index_quiz='".$index_quiz."' and index_medecin='"

				.$sindex_medecin."'";

				$resultat=mysqli_query($con,$sql_resultat);
				$note = 0;
				while ($row_resultat = mysqli_fetch_array($resultat)) {	
					$note = intVal($row_resultat['2']);
					$sql_up_med="UPDATE medecin SET total_t_rep='".$row_resultat['1']."',total_note='".$row_resultat['2']."',total_rep_val='".$row_resultat['3']."' WHERE index_medecin='".$row_resultat['0']."'";

					$up_med=mysqli_query($con,$sql_up_med);
				}
				//Verification Validation
				
				$request = "SELECT sum(p.validation) FROM `proposition` p , question q WHERE q.index_quiz = ".$index_quiz." and p.index_question = q.index_question GROUP by q.index_quiz";
				if(mysqli_query($con,$request)){
					$max_note = mysqli_fetch_row(mysqli_query($con,$request))[0];
				}

				if ((intval($max_note) * 0.8) <= $note){
					include "pdf.php";
					echo "Bravo vous avez réusie!!!!! <br> ";
					echo "Vous pouvez télécharger votre attestation sur ce <a href='".$path."'>lien</a>" ;
				}

				else{

						//verifier nombre tetative 

					if ($snum_tenta<4){
						sleep(3);
						echo "<meta http-equiv='"."refresh'"."content='0;url=./presentation2.php"."'>";

					}else{

						echo "Vous n'avez pas réusie votre quiz!!!!!";
						

					}				

				}

					

				/*

				//Affichage resultat dans un tableau 

				$sql_affichage="SELECT * FROM medecin WHERE index_medecin in( select index_medecin from reponse where index_quiz='".$index_quiz."') ORDER BY total_note DESC, total_t_rep ASC";

				$affichage=mysqli_query($con,$sql_affichage);

				while ($row_affichage = mysqli_fetch_array($affichage)) {

					

					echo "<tr>

							<td>".$row_affichage['nom']."</td><td>".$row_affichage['prenom']."</td><td>".$row_affichage['num_tel']."</td><td align='center'>".$row_affichage['mail']."</td><td   align='center'>".$row_affichage['total_note']."</td><td  align='center'>".$row_affichage['total_t_rep']."</td><td  align='center'>".$row_affichage['total_rep_val']."</td><td><a href='./details.php?idm=".$row_affichage['index_medecin']."' target=_blank>Détail</a></td></tr>";

				}

				

				

				/*echo "<div class='Question'>".$row_question['1']."</div><br>";

				$sql_proposition="SELECT * FROM proposition WHERE index_question = '".$num_question."'";

				$question=mysqli_query($con,$sql_proposition);*/

				///// Recuperer les information du question demander 

				/*

				$sql_question="SELECT * FROM question where index_question='1'";

				$question=mysqli_query($con,$sql_question);

				$row_question = mysqli_fetch_array($question);

				echo "quetsion : ".$row_question['0']."<br>";

				*//*

				//$sql_reponse="SELECT * FROM reponse where index_question='".$row_question['0']."' ORDER BY date_rep LIMIT 3";

				$sql_reponse="SELECT * FROM reponse where index_question='1'";

				$reponse=mysqli_query($con,$sql_reponse);

				//$row_reponse = mysqli_fetch_array($reponse);

				//echo "rep 1".$row_reponse['0']." <br>";

				//initialiser le compteur de resultat

				$cpt_result=0;

				echo $cpt_result;

				while ($row_reponse = mysqli_fetch_array($reponse)) {

					echo "rep ".$row_reponse['0']." <br>";*/

					/*$sql_validation="SELECT * FROM `proposition`, det_rep where proposition.index_proposition = det_rep.index_proposition and det_rep.index_rep='".$row_reponse['0']."'";

					$validation=mysqli_query($con,$sql_validation);

					$cpt_validation=0;

					while ($row_validation = mysqli_fetch_array($validation)){

						if(	$row_validation['validation']==$row_validation['valeur']){

							++$cpt_validation;

						}else{

							break;

						}

						

					}

					echo "le compteur est ".$cpt_validation;

				

				}

				

				/*while ($row_question = mysqli_fetch_array($question)) { 

					if($row_question['5']=='0'){

						$valeur="Non Activé";

					}else

					{

						$valeur="Activé";

					}

					echo "

            				<tr>

            					<td align='left'>

           		      				".$row_question['0'].")-	

            					</td>

            					<td align='left'>

           							".$row_question['1']."     	

            					</td>

								<td align='left'>

           							".$valeur."        .   	

            					</td>	

             						<td align='right'>	<input type='radio' name='que".$row_question['0']."' id='nom'></td>

            				</tr>";

				}*/

			?>

         

      	

      </fieldset>

      

     

      </main>



      </br>

      </br>

      </br>

<footer class="content-info py-5 " id="footer" style="position: absolute;
    bottom: 0;
    width: 100%;">

	<a href="http://www.supinformatique.com" class="mr-2" target="_blank" rel="noopener"><p>© 2018 <font color="#999999">Sup</font><font color="red">I</font>nformatique</p></a> 

</footer>

</body>

</html>