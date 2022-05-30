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
//recup indice premier question
$sql_question="SELECT * FROM question where index_quiz='".$index_quiz."'";
			$question=mysqli_query($con,$sql_question);
			$row_question = mysqli_fetch_array($question);
			$_SESSION['id_question']=$row_question[0];
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
      <p align="center">Cette page permet d'activer la question du Quiz n°: <?php echo $index_quiz; ?></p>
       <form name="inscription" action="./wp-includes/php/gestquestion.php" method="post">
      		<fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 80%; margin:  0px auto;border:2px solid #666;
    							-moz-border-radius:8px;
   								-webkit-border-radius:8px;border-radius:8px;">
            <table align="center" width="100%">
            <?php
			
			
				/*echo "<div class='Question'>".$row_question['1']."</div><br>";
				$sql_proposition="SELECT * FROM proposition WHERE index_question = '".$num_question."'";
				$question=mysqli_query($con,$sql_proposition);*/
				///// Recuperer les information du question demander 
				$sql_question="SELECT * FROM question where active<'2' and index_quiz='".$index_quiz."'";
				$question=mysqli_query($con,$sql_question);
				while ($row_question = mysqli_fetch_array($question)) { 
					if($row_question['5']=='0'){
						$valeur="Non Activé";
					}else
					{
						$valeur="Activé";
					}
					$cpt_question=$row_question['0']-$_SESSION['id_question']+1;
					echo "
            				<tr>
            					<td align='left' valign='top'>
           		      				".$cpt_question.")- 	
            					
           							".$row_question['1']."     	
            					</td>
								<td align='left' width='120' valign='top'>
           							".$valeur."        .   	
            					</td>	
             						<td align='right' valign='top'>	<input type='radio' name='que".$row_question['0']."' id='nom'></td>
            				</tr>";
					
				}
				$sql_question="SELECT * FROM question where active<'2' and index_quiz='".$index_quiz."'";
				$question=mysqli_query($con,$sql_question);
				if(empty(mysqli_fetch_array($question))){
					echo "<meta http-equiv='"."refresh'"."content='0;url=./resultat.php'>Resultat";
					}
			?>
           </table>
        </br><hr>
        	<input type="submit" class="hamburger hamburger--collapse is-active pr-0" name="a_submit" id="a_submit"  style="float:right;font-size:14px" value="Activer">
            <input type="submit" class="hamburger hamburger--collapse is-active pr-0" name="d_submit" id="d_submit"  style="float:right;font-size:14px" value="Desactiver">
        </br><hr>
      	
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