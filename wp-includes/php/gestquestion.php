<?php
require('cnx.php');
if(!isset($_SESSION)){
    session_start();
}
require('./cnx.php');
$num_quiz = $_SESSION["index_quiz"];
$sql_question="SELECT * FROM question where active<'2' and index_quiz='".$num_quiz."'";
				$question=mysqli_query($con,$sql_question);
while ($row_proposition = mysqli_fetch_array($question)) {	
	$indice="que".$row_proposition['0'];
	//echo $indice;
	if(isset($_POST[$indice])){
		//echo "<br>".$_POST[$indice];
		if($_POST['a_submit']){
			$sql_uquestion="UPDATE question SET active= '1' WHERE index_question='".$row_proposition['0']."'";
		}else if($_POST['d_submit']){
   			$sql_uquestion="UPDATE question SET active= '2' WHERE index_question='".$row_proposition['0']."'";
				}
		if(mysqli_query($con,$sql_uquestion)){
			echo "mise ajour ok";
		}
	}
}

echo "<meta http-equiv='"."refresh'"."content='0;url=../../admin.php"."'>";	
?>