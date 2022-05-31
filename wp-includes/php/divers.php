<?php



require('cnx.php');

if(!isset($_SESSION)){

    session_start();

}

//recuperation variable session  

$num_quiz = $_SESSION["index_quiz"];



$sql_question="SELECT * FROM question where active='1' and index_quiz='".$num_quiz."'";

			$question=mysqli_query($con,$sql_question);

			$row_question = mysqli_fetch_array($question);



	//base non vide 

	if(isset($row_question)){
	
		if(isset($_SESSION["dernier_question"])){
		
				if($_SESSION["dernier_question"]==$row_question['0']){


					// echo "session";
					// var_dump($_SESSION);
					// echo "question";
					// var_dump($row_question['0']);
					// die;


    				echo "<script>

					alertConfig={

   					boxBgClass:'myButton', //Background class

   					boxBtnCloseClass:'myButton', //Button close class

					};

					alert(\"tu a deja repondu sur cette question!!!\");

					</script>";

					echo "<meta http-equiv='"."refresh'"."content='0;url=../../quiz.php"."'>";

					exit;

				}

		}

		$_SESSION['index_question']=$row_question['0'];

					echo "<meta http-equiv='"."refresh'"."content='0;url=../../question.php"."'>";

					

	}else 

	{

		

		echo "<script>

				alertConfig={

   					boxBgClass:'myButton', //Background class

   					boxBtnCloseClass:'myButton', //Button close class

				};

				alert(\"Pas de question pour le moment!!!!\");

				</script>";

		echo "<meta http-equiv='"."refresh'"."content='0;url=../../quiz.php"."'>";

	}

?>

