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

if(isset($_SESSION['index_question'])){
    $num_question=$_SESSION['index_question'];

}


//depart time 

if(isset($_SESSION['nombre_tenta'])){

	if ($_SESSION['nombre_tenta']<3){

		$_SESSION['nombre_tenta']=$_SESSION['nombre_tenta']+1;

	}else

	{

		echo "<script>alert(\"vous avez effectuer toute vos tentatives veuillez fermer votre navigateur\")</script>";

		echo "<meta http-equiv='"."refresh'"."content='0;url=../../index.php'>";

	}

}else{

	$_SESSION['nombre_tenta']=1;

}

//echo $_SESSION['nombre_tenta'];

$_SESSION['start_time']=time();

?>
<body>

    <div >
        <img src="cours/Diapositive1.GIF" id="imageBloc" style="width:80%;margin:auto; display:block;max-height:700px"><br>
        <button onclick="nextDiapo()"  style="    background-color: #fea;
    padding: 5px;
    border-color: #fea;
    position: fixed;
    top:0;
    right:10%;
    ">Suivant</button>
    </div>
   

</body>

<script type="text/javascript">
    var currentDiapo = 1;
    var imgSelector = document.getElementById("imageBloc");
    function nextDiapo(){
        currentDiapo++;
        if(currentDiapo < 37){
            imgSelector.src = "cours/Diapositive"+currentDiapo+".GIF";
        }
        else{
            // location.href =  window.location.origin+'quizz/wp-includes/php/divers.php';
            window.location.replace(window.location.origin+'/quizz/wp-includes/php/divers.php');

        }

    }
</script>
<html>




