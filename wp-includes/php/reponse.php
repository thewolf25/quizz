<?php
// Change this to your connection info.
require('cnx.php');

if(!isset($_SESSION)){
    session_start();
}

//Initialisation variable cession 
$sindex_medecin=$_SESSION["index_medecin"];
$snum_quiz=$_SESSION["index_quiz"];
$snum_question=$_SESSION["index_question"];
$temp_rep=time()-$_SESSION['start_time'];

//echo 'session de :'.$snum_quiz.'</br>';
//echo 'session de :'.$sindex_medecin.'</br>';
//echo 'session de :'.$snum_question.'</br>';
///Ajout Table reponse 
///valeur de text non vide 
$text="rep_txt";
if(isset($_GET[$text])){
		$sql_qreponse="INSERT INTO reponse(index_quiz,index_medecin,index_question,temp_rep,Text_rep) VALUES ('".$snum_quiz."','".$sindex_medecin."','".$snum_question."','".$temp_rep."','".$_GET[$text]."')";
		//echo "bonjour";
		if(mysqli_query($con,$sql_qreponse)){
			//echo 'Mise a jour table reponse : OK</br>';
			$_SESSION["cpt_question"]=$_SESSION["cpt_question"]+1;
		}else
		{
			echo "<meta http-equiv='"."refresh'"."content='0;url=../../quiz.php"."'>";
		}
}
else {
		$sql_qreponse="INSERT INTO reponse(index_quiz,index_medecin,index_question,temp_rep) VALUES ('".$snum_quiz."','".$sindex_medecin."','".$snum_question."','".$temp_rep."')";
		//echo "bonjour2";
		if(mysqli_query($con,$sql_qreponse)){
			//echo 'Mise a jour table reponse : OK</br>';
			$_SESSION["cpt_question"]=$_SESSION["cpt_question"]+1;
		}else
		{
			echo "<meta http-equiv='"."refresh'"."content='0;url=../../quiz.php"."'>";
		}
/// selection position table reponse 
$sql_reponse="SELECT * FROM reponse WHERE index_quiz = '".$snum_quiz."' and index_medecin='".$sindex_medecin."' and index_question='".$snum_question."'";
//$sql_reponse="INSERT INTO reponse(index_quiz,index_medecin,index_question,date_rep) VALUES ('1','1','1')";
				$sreponse=mysqli_query($con,$sql_reponse);
				$row_reponse = mysqli_fetch_array($sreponse);
/// selection les propositions 
$sql_proposition="SELECT * FROM proposition WHERE index_question = '".$snum_question."'";
//$sql_proposition="SELECT * FROM proposition WHERE index_question = '1'";
				$question=mysqli_query($con,$sql_proposition);
				if($question){
					
					$note=0;
					//echo 'selection proposition : OK </br>';
				}else
				{
					//echo 'selection proposition : non </br>';
					echo "<meta http-equiv='"."refresh'"."content='0;url=../../quiz.php"."'>";
				}
///// lire le reponse			
				while ($row_proposition = mysqli_fetch_array($question)) {
					$indice="con".$row_proposition['0'];
					//echo "indice est : ".$indice."</br>";
					if(isset($_GET[$indice])){
						
							$valeur="1"; 
					}
					else
					{
						$valeur="0";
					}
					//lire valeur
					//echo "la valeur selection est : ".$valeur."<br>"; 
					
					// donner la note au medecin / question 
					if ($valeur==$row_proposition['validation']){
						++$note;	
					}
					//insertion table det_rep
					$sql_question="INSERT INTO det_rep (index_rep, index_proposition, valeur) VALUES ('".$row_reponse['0']."','".$row_proposition['0']."','".$valeur."')";
					if(mysqli_query($con,$sql_question)){
						//echo 'Mise a jour table det-rep : OK <br>';
						//Ajouter Note 
						$nbproposition= mysqli_num_rows($question);
						if ($note==$nbproposition){
							$sql_note="UPDATE reponse SET note='".$note."',rep_val='1' WHERE index_rep='".$row_reponse['0']."'";
							$rsl_note=mysqli_query($con,$sql_note);	
						}else {
							$sql_note="UPDATE reponse SET note='".$note."' WHERE index_rep='".$row_reponse['0']."'";
							$rsl_note=mysqli_query($con,$sql_note);
						}
					}else
					{
						//echo 'Mise a jour table det-rep : non <br>';
					}
				}
}
					//echo "probleme de selection de valeur get!!! <br>";
//$sql_uquestion="UPDATE question SET active= '2' WHERE index_question='".$snum_question."'";
//		if(mysqli_query($con,$sql_uquestion)){
				//verifier la dernier question repondu
				$_SESSION["dernier_question"]=$snum_question;
				$_SESSION["index_question"]=$_SESSION["index_question"]+1;
				
				$sql_question="SELECT COUNT(index_question) FROM question where index_quiz='".$snum_quiz."'  and active='1'";
				$question=mysqli_query($con,$sql_question);
				$row_question = mysqli_fetch_array($question);
				echo "<meta http-equiv='"."refresh'"."content='0;url=../../resultatdeg.php"."'>";
				/*
				if($_SESSION["index_question"]>$row_question['0']){
					echo "<meta http-equiv='"."refresh'"."content='0;url=../../question.php"."'>";
				}else{
					echo "<meta http-equiv='"."refresh'"."content='0;url=../../resultatdeg.php"."'>";
				}*/
				
//					}

?>
