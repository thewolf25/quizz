<?php
require('cnx.php');
if(!isset($_SESSION)){
    session_start();
}
//if(!empty($_GET['nom'])) {echo $_GET['nom'];}

//if (isset($_GET['submit']))
//{
//  recuperation num de quiz
$num_quiz=$_SESSION['index_quiz'];
//$num_question=$_SESSION['index_question'];
//recuperation valeur 
if(isset($_GET['nom'])){
	$nom = htmlspecialchars(trim($_GET['nom']));
}
else
{
	echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";
}
if(isset($_GET['prenom'])){
	$prenom = htmlspecialchars(trim($_GET['prenom']));
}
else
{
	echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";
}
if(isset($_GET['phone'])){
	$phone = htmlspecialchars(trim($_GET['phone']));
}
else
{
	echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";
}
if(isset($_GET['mail'])){
	$mail = htmlspecialchars(trim($_GET['mail']));
}
else
{
	echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";
}
// insertion medecin
$sql_qmedecin="INSERT INTO medecin(nom,prenom,num_tel,mail) VALUES ('".$nom."','".$prenom."','".$phone."','".$mail."')";
		if(mysqli_query($con,$sql_qmedecin)){
			//echo 'Mise a jour table medecin : OK</br>';
		}else
		{
			echo "<script>alert(\"Probleme d'inscription veuillez contacter l'administrateur!!!\")</script>";
			echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";
		}
/// selection new indice for medecin 
$sql_medecin="SELECT * FROM medecin WHERE nom = '".$nom."' and prenom='".$prenom."' and num_tel='".$phone."' and mail='".$mail."'";
//$sql_reponse="INSERT INTO reponse(index_quiz,index_medecin,index_question,date_rep) VALUES ('1','1','1')";
				$sreponse=mysqli_query($con,$sql_medecin);
				$row_reponse = mysqli_fetch_array($sreponse);
				
//recup indice premier question
$sql_question="SELECT * FROM question where index_quiz='".$num_quiz."'";
			$question=mysqli_query($con,$sql_question);
			$row_question = mysqli_fetch_array($question);
			$_SESSION['id_question']=$row_question[0];


  				if($row_reponse){
					//echo "Indice medecin est  : OK".$row_reponse['0']." </br>";
					$_SESSION["index_medecin"]=$row_reponse['0'];
					//$_SESSION["cpt_question"]=1;
					echo "<meta http-equiv='"."refresh'"."content='0;url=../../quiz.php'>";
				}else
				{
					echo "<script>alert(\"Probleme d'inscription veuillez contacter l'administrateur!!!\")</script>";
					echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";
				}
?>