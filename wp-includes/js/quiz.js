function ftime()
{
message='Voilà!\nC\'est fini!';//ici tu fou ton message.     pour mettre un " tu écris \" , pour mettre un ' , tu écris \' et pour écrire une saut a la ligne tu écris \n
temps=2000;//ici tu met le temps en millisecondes apres lequel tu veux que ton paragrapphe s'affiche...
setTimeout("document.getElementById('attente').style.display='none';",temps);
setTimeout("alert(message);",temps+1);
setTimeout("document.getElementById('leparagrapheoutumettonimage').style.display='block';",temps+2);
}
var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}