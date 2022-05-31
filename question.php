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

$num_question=$_SESSION['index_question'];

//depart time 

$_SESSION['start_time']=time();



//echo "bonjour3".$_SESSION['index_question'];

//$cpt_question=$_SESSION["cpt_question"];

//$_SESSION['index_question']=$num_question;

//$_SESSION['index_medecin']=$num_medecin;

//$_SESSION['index_medecin']='1';

//$nbr_question = htmlspecialchars(trim($_GET['nbr_question']));

///// Recuperer les information du question demander 



$sql_question="SELECT * FROM question where index_question='".$num_question."'  and active='1'";

			$question=mysqli_query($con,$sql_question);

			$row_question = mysqli_fetch_array($question);



	//base non vide 

	if(!isset($row_question)){

		echo "<script>

				alertConfig={

   					boxBgClass:'myButton', //Background class

   					boxBtnCloseClass:'myButton', //Button close class

				};

				alert(\"Pas de question pour le moment!! ".$_SESSION['index_question']."ttt \");

				</script>";

		echo "<meta http-equiv='"."refresh'"."content='0;url=./quiz.php"."'>";

	}else{

		if(isset($_SESSION["dernier_question"])){

				if($_SESSION["dernier_question"]==$row_question['0']){

    				// echo "<script>

					// alertConfig={

   					// boxBgClass:'myButton', //Background class

   					// boxBtnCloseClass:'myButton', //Button close class

					// };

					// alert(\"tu a deja repondu sur cette question!!!\");

					// </script>";

					// echo "<meta http-equiv='"."refresh'"."content='0;url=./quiz.php"."'>";

					// exit;

				}

		}

	}

$cpt_question=$_SESSION['id_question'];		

?>

<script>

var i = 0;

function move() {

  	if (i == 0) {

    	i = 1;

    	var elem = document.getElementById("myBar");

    	var width = 1;

    	var id = setInterval(frame, 500);

    	function frame() {

      		if (width >= 100) {

        		clearInterval(id);

        		i = 0;

					window.location.replace("./wp-includes/php/reponse.php");

      		} else {

       			width++;

        		elem.style.width = width + "%";

      		}

    	}

	}

}

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

       <form action="./wp-includes/php/reponse.php" name="fquiz" method="get">

      <fieldset style="font-size:14px;padding:16px;line-height:1.8;width: 500px; margin:  0px auto;border:2px solid #666;

    -moz-border-radius:8px;

    -webkit-border-radius:8px;	

    border-radius:8px;">

      		<legend style="color: #00F;"><?php 

			$cpt_question=$row_question['0']-$_SESSION['id_question']+1;

			echo "Quiz n°: ".$num_quiz." Question n°: ".$cpt_question ?> </legend> <!-- Titre du fieldset -->

            <!--<input type="text" name="login" id="login"/ autofocus required>-->

		

        <?php
// echo "<pre>";
// var_dump($row_question);
// echo "</pre>";


// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
// die;

			

				echo "<div class='Question'>".$row_question['1']."</div><br>";

				if ($row_question['2']=="textarea"){

						echo "<textarea rows='4' cols='61' name='rep_txt' id='rep_txt'></textarea>" ;

						//echo "<input type='text' rows='4' cols='61' name='rep_txt' id='rep_txt' />";

				}

				else 

				{

					$sql_proposition="SELECT * FROM proposition WHERE index_question = '".$num_question."'";

					$question=mysqli_query($con,$sql_proposition);

			

					while ($row_proposition = mysqli_fetch_array($question)) { 

						if ($row_question['2']=="radio"){

							echo "<input type='". $row_question['2']."' name='con1' id='confirmation' />";

						}

						else{

							echo "<input type='". $row_question['2']."' name='con".$row_proposition['0']."' id='confirmation' />";

						}

						echo "<label for='confirmation'> -  ".$row_proposition['2']."</label><br>";

					}

				}

		?>

			

		

        <br>

        <input class="hamburger hamburger--collapse is-active pr-0" id="b_submit" type="submit" style="float:right; color: #00F; font-size:16px; text-decoration: underline;" value="Valider">

        <br><hr>

      	<div id="myProgress">

  				<div id="myBar"></div>

		</div> 

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