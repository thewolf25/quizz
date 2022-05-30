// JavaScript Document
//var ma_matrice = creer_matrice();
//alert(ma_matrice);

function result(i,k,l,m)
{
	var tab=new Array();
	tab[0]=new Array();
	tab[1]=new Array();
	tab[2]=new Array();
	tab[3]=new Array();
	tab[4]=new Array();
	tab[5]=new Array();
	
	tab[0][0]=60.98;
	tab[0][1]=-33.72;
	tab[0][2]=48.35;
	tab[0][3]=116.85;
	tab[0][4]=110.35;
	tab[0][5]=126.19;
	
	tab[1][0]=348.34;
	tab[1][1]=564.16;
	tab[1][2]=315.79;
	tab[1][3]=269.57;
	tab[1][4]=222.51;
	tab[1][5]=229.03;
	
	tab[2][0]=108.7;
	tab[2][1]=84.96;
	tab[2][2]=110.94;
	tab[2][3]=140.95;
	tab[2][4]=87.51;
	tab[2][5]=49.71;
	
	tab[3][0]=346.3;
	tab[3][1]=440.04;
	tab[3][2]=309.58;
	tab[3][3]=225.19;
	tab[3][4]=333.99;
	tab[3][5]=364.47;
	
	tab[4][0]=142.37;
	tab[4][1]=67.16;
	tab[4][2]=134.44;
	tab[4][3]=29.78;
	tab[4][4]=126.62;
	tab[4][5]=106.17;
	
	tab[5][0]=499.93;
	tab[5][1]=474.96;
	tab[5][2]=351.64;
	tab[5][3]=519.38;
	tab[5][4]=314.66;
	tab[5][5]=286.37;

	var longueur=tab.length;
	
	var rage= Number(Age(k));
	var retude=Number(Etude(l));
   retude=retude+Number(m);
   i=i.replace(",","."); 
   if (i<tab[rage][retude])
   {
	   
	   document.getElementById("demo").innerHTML = "R&eacute;sultat &Egrave;ronn&eacute;";
	   document.getElementById("demo").style.color = 'Red';
   }else if(i>=tab[rage][retude] && i<= tab[rage+1][retude])
   {
	   
	    document.getElementById("demo").innerHTML = "Le patient ne pr&eacute;sente pas une Enc&eacute;phalopathie infraclinique";
		document.getElementById("demo").style.color = 'Lime';
   }
   else
   {
	   
	    document.getElementById("demo").innerHTML = "Le patient pr&eacute;sente une Enc&eacute;phalopathie infraclinique";
		document.getElementById("demo").style.color = 'Maroon';
   }
   

   
  
}
function Age(i)
{
	
	if (i>=40 && i<50)
	{
		
		return  0;
	}
	else if (i>=50 && i<=60)
	{
		return 2;
	}
	else 
	{
		return 4;
	}
	
}
function Etude(i)
{
	
	if (i<6)
	{
		
		return  0;
	}
	else if (i>=6 && i<=13)
	{
		return 2;
	}
	else 
	{
		return 4;
	}
	
}