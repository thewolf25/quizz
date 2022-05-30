<!doctype html>
<html>
<head>
<title>Afficher la durée de visite sur une page Web</title>
<style type="text/css">
      #time
		{
			width: 200px;
            height: 50px;
            line-height: 50px;
            border: 1px dotted #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
		}
		#presenter
		{
			font-size: 17px;
			visibility: hidden;
		}
		
		input[type="button"] {
            border: none;
            padding: 10px;
            background-color: rgba(50,205,50, 0.25);
            cursor: pointer;
        }

	</style>
<script>
// initialisation des variables
/* jshint expr: true */
        var centi = 0;
        var mili = 0;
        var sec = 0;
        var sec_;
        var afficher;
        var compteur;

        // affichage du compteur à 0
        document.getElementById('time').innerHTML = "0" + sec + ":" + "0" + mili;


        
        function chrono() {
            setInterval(function (){
                mili++;
                    if (mili > 9) {
                        mili = 0;
                    }
            }, 1);
            
            centi++;
            centi*10;//=======pour passer en dixièmes de sec
            //=== on remet à zéro quand on passe à 1seconde
            if (centi > 9) {
                centi = 0;
                sec++;
            }  

            if (sec < 10) {
                sec_ = "0" + sec;
            }
            else {
                sec_ = sec;
            }
                
            afficher = sec_ + ":" + centi + mili;
            document.getElementById("time").innerHTML = afficher;
            
            reglage = window.setTimeout("chrono();",100);
        } 
        
        
        function debut()  //== Activation et désactivation des boutons
            {
                    document.parametre.lance.disabled = "disabled";
                    document.parametre.pause.disabled = "";
                    document.parametre.zero.disabled = "";
                    document.parametre.intermediaire.disabled = "";
                    document.parametre.rappel.disabled = "";
            }
        function arret() 
            {	
                    window.clearTimeout(reglage);
                    document.parametre.lance.disabled = "";
                    document.parametre.pause.disabled = "disabled";
                    document.parametre.zero.disabled = "";
                    document.parametre.intermediaire.disabled = "";
                    document.parametre.rappel.disabled = "";
            }
            
        function raz() //====pour remettre à zéro
            { 
                    document.parametre.zero.disabled = "disabled";
                    document.parametre.intermediaire.disabled = "disabled";
                    document.parametre.rappel.disabled = "disabled";
                    centi = 0;
                    mili = 0;
                    sec = 0;
                    compteur = "aucun temps intermediaire enregistré";
                    afficher = sec + "0:" + centi + mili;	
                    document.getElementById("time").innerHTML = afficher;
                    document.getElementById('presenter').style.visibility='hidden';
                    document.getElementsByName('intermediaire')[0].style.backgroundColor = 'rgba(50,205,50, 0.25)';
            }
            
        function inter() //==== Pour afficher le temps intermédiaire
        {
            compteur = document.getElementById("time").innerHTML;
            document.getElementsByName('intermediaire')[0].style.backgroundColor = "orange";
        }

         function rappeler() {
            document.getElementById('presenter').style.visibility='visible';
            document.getElementById('interm').innerHTML = compteur;
            document.getElementsByName('intermediaire')[0].style.backgroundColor = 'rgba(50,205,50, 0.25)';
        }
</script>

</head>
<body >

<h1>Chronomètre en Javascript</h1>

    <div id="time"></div>


	<form name="parametre" action="" method="">
        <input type="button" name="lance"  value="Démarrer" onclick="chrono();debut();">
        <input type="button" name="pause"  value="Stop" onclick="arret();" disabled="disabled">
        <input type="button" name="zero"  value="Effacer" onclick="arret();raz();" disabled="disabled">
        <input type="button" name="intermediaire"  value="Intermediaire" onclick="inter();" disabled="disabled">
        <input type="button" name="rappel"  value="Rappel" onclick="rappeler();" disabled="disabled">
    </form>


	<div id="presenter">
        <p>Temps intermediaire : </p>
        <span id="interm"></span>
    </div>
	</div> 
    <p align="right"><input type=button onclick=window.location.href='./question.php'; value=Quiz /></p>
</body>
</html>