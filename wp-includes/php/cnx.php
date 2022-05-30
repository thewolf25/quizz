<?php

// Change this to your connection info.

// local host




$DATABASE_HOST = 'localhost';

$DATABASE_USER = 'root';

$DATABASE_PASS = '';

$DATABASE_NAME = 'quiz';





// Try and connect using the info above.

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {

	// If there is an error with the connection, stop the script and display the error.

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());

}



/*$index_quiz=$_SESSION["index_quiz"];

///// Selection de qestion numero 1

$sql_question="SELECT * FROM question where index_quiz='".$index_quiz."'";

			$question=mysqli_query($con,$sql_question);

			$row_question = mysqli_fetch_array($question);

//

// recuprer le nombre total de question 



	$nbr_question = mysqli_num_rows($question);

//	$_SESSION["nbr_question"]=$nbr_question;

/* Modification du jeu de résultats en utf8mb4 */

if (!mysqli_set_charset($con, "utf8mb4")) {

    printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", mysqli_error($con));

    exit();

}

//mysqli_close($con);

?>

