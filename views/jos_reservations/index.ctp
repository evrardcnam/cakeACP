<?
$debut = debut_calcultemps();
/* FONCTIONS PERMETTANT DE CALCULER LE TEMPS D'EXÉCUTION D'UNE PAGE */
function debut_calcultemps() {
	$trouver_temps = explode(' ',microtime() );
	$temps_debut = $trouver_temps[1].substr($trouver_temps[0], 1);
	return $temps_debut;
}

function ecrire_temps($temps_debut,$precision) {
	$partie_temps = explode(' ',microtime() );
	$fin_temps = $partie_temps[1].substr($partie_temps[0],1);
	$chrono = number_format($fin_temps - $temps_debut, 4);
	if($precision > strlen($chrono)) {                      //si la precision demandée est plus grande que la longueur de la chaine
		$chrono = substr($chrono, 0, strlen($chrono));          //on donne la precision maximale
	} else {
		$chrono = substr($chrono, 0, $precision);
	}
	return $chrono;
}

?>
<style>
th {
	background-color: #FCFFCD;
	border: thin solid;
}

td {
	text-align: center;
	vertical-align: top;
	border: thin solid;
}

.reserve {
	color: red;
	background-color: lightyellow;
	border-style: outset;
}

h1 {
	background: #fff;
	color: #e32;
	font-family: 'Gill Sans', 'lucida grande', helvetica, arial, sans-serif;
	font-size: 190%;
	margin: 0.3em 0;
	padding-top: 0.8em;
}

h2 {
	display: none;
}

h3 {
	font-size: 15px;
	padding-bottom: 3px;
}
</style>
<div class="josReservations index">
<h2><?php __('JosReservations');?></h2>
<p><?php

error_reporting(0);

######### begin fonctions #########
/****
 * Titre: Date format MySQL en date Francaise
 * Auteur: FreeCreator
 * Email: freecreator59@hotmail.com
 * Url:
 * Description: Cette fonction permet de convertir une date au format MySQL en date Francaise.

 Elle retourne la date en francais avec heures et minutes
 ****/
function datefr($date_sql){
	// Declaration du tableau des noms de jours en Francais
	//-------- ici


	$j_fr[Sunday]     = "Dimanche";
	$j_fr[Monday]     = "Lundi";
	$j_fr[Tuesday]     = "Mardi";
	$j_fr[Wednesday]    = "Mercredi";
	$j_fr[Thursday]    = "Jeudi";
	$j_fr[Friday]     = "Vendredi";
	$j_fr[Saturday]     = "Samedi";

	// Declaration du tableau des noms de jours en Francais
	$m_fr[1]    = "Janvier";
	$m_fr[2]    = "Fevrier";
	$m_fr[3]    = "Mars";
	$m_fr[4]    = "Avril";
	$m_fr[5]    = "Mai";
	$m_fr[6]    = "Juin";
	$m_fr[7]    = "Juillet";
	$m_fr[8]    = "Aout";
	$m_fr[9]    = "Septembre";
	$m_fr[10] = "Octobre";
	$m_fr[11] = "Novembre";
	$m_fr[12] = "Decembre";

	$la_date    = explode(' ', $date_sql); // on decompose la date SQL
	$heure_sql= explode(':',$la_date[1]); // On prend la partie heure
	$date_sql    = explode('-',$la_date[0]); // On prend la partie date


	if (substr($date_sql[1],0,1) == '0' ) // On verifie si le 1er caractere est 0 dans le numero du mois
	{
		// si oui alors on supprime le 1er caractere
		$date_sql[1] = substr($date_sql[1],1,strlen($date_sql[1]) -1);
	}

	$heure = $heure_sql[0]; // La variable de l'heure
	$minutes = $heure_sql[1]; // La variable des minutes
	$secondes = $heure_sql[2]; // la variable des secondes

	$annee = $date_sql[0]; // La variable des annees
	$num_mois = $date_sql[1]; // La variable du numero du mois
	$nom_mois = $m_fr[$num_mois]; // La variable du mois en francais
	$num_jour = $date_sql[2]; // Le numero du jour
	$nom_jour = $j_fr[date("l", mktime(0,0,0,$num_mois,$num_jour,$annee))]; // Le nom du jour en francais

	#  $date = "Le $nom_jour $num_jour $nom_mois $annee"; // On forme la date
	$date = "$nom_jour $num_jour $nom_mois $annee"; // On forme la date
	$heure = "$heure:$minutes:$secondes"; // On forme l'heure

	#$date_fr= $date.' à '.$heure;
	$date_fr= $date;

	//retour de cette variable
	return $date_fr;
}
/* ######### AJOUTS fradeff www.akademia.ch lundi 11 juin 2007, 21:09:59 (UTC+0200) ###### */

#renvoyer la date complete mais pas les heures et minutes
function datefr_short($date_sql){
	// Declaration du tableau des noms de jours en Francais
	//-------- ici
	$j_fr[Sunday]     = "dimanche";
	$j_fr[Monday]     = "lundi";
	$j_fr[Tuesday]     = "mardi";
	$j_fr[Wednesday]    = "mercredi";
	$j_fr[Thursday]    = "jeudi";
	$j_fr[Friday]     = "vendredi";
	$j_fr[Saturday]     = "samedi";

	// Declaration du tableau des noms de jours en Francais
	$m_fr[1]    = "janvier";
	$m_fr[2]    = "février"; 
	$m_fr[3]    = "mars";
	$m_fr[4]    = "avril";
	$m_fr[5]    = "mai";
	$m_fr[6]    = "juin";
	$m_fr[7]    = "juillet";
	$m_fr[8]    = "août"; 
	$m_fr[9]    = "septembre";
	$m_fr[10] = "octobre";
	$m_fr[11] = "novembre";
	$m_fr[12] = "décembre"; 

	$la_date    = explode(' ', $date_sql); // on decompose la date SQL
	$heure_sql= explode(':',$la_date[1]); // On prend la partie heure
	$date_sql    = explode('-',$la_date[0]); // On prend la partie date


	if (substr($date_sql[1],0,1) == '0' ) // On verifie si le 1er caractere est 0 dans le numero du mois
	{
		// si oui alors on supprime le 1er caractere
		$date_sql[1] = substr($date_sql[1],1,strlen($date_sql[1]) -1);
	}

	$heure = $heure_sql[0]; // La variable de l'heure
	$minutes = $heure_sql[1]; // La variable des minutes
	$secondes = $heure_sql[2]; // la variable des secondes

	$annee = $date_sql[0]; // La variable des annees
	$num_mois = $date_sql[1]; // La variable du numero du mois
	$nom_mois = $m_fr[$num_mois]; // La variable du mois en francais
	$num_jour = $date_sql[2]; // Le numero du jour
	$nom_jour = $j_fr[date("l", mktime(0,0,0,$num_mois,$num_jour,$annee))]; // Le nom du jour en francais

	#  $date = "Le $nom_jour $num_jour $nom_mois $annee"; // On forme la date
	$date = "$nom_jour $num_jour $nom_mois $annee"; // On forme la date
	$date_fr= $date;

	//retour de cette variable
	return $date_fr;
}

#renvoyer le nom du jour
function jourfr_short($date_sql){
	// Declaration du tableau des noms de jours en Francais
	//-------- ici
	$j_fr[Sunday]     = "Dimanche";
	$j_fr[Monday]     = "Lundi";
	$j_fr[Tuesday]     = "Mardi";
	$j_fr[Wednesday]    = "Mercredi";
	$j_fr[Thursday]    = "Jeudi";
	$j_fr[Friday]     = "Vendredi";
	$j_fr[Saturday]     = "Samedi";

	#$la_date    = explode(' ', $date_sql); // on decompose la date SQL
	$date_sql    = explode('-',$date_sql); // On prend la partie date
	$annee = $date_sql[0]; // La variable des annees
	$num_mois = $date_sql[1]; // La variable du numero du mois

	$num_jour = $date_sql[2]; // Le numero du jour
	$nom_jour = $j_fr[date("l", mktime(0,0,0,$num_mois,$num_jour,$annee))]; // Le nom du jour en francais

	//retour de cette variable
	return $nom_jour;
}

#convertir date MySQL YYYY-MM-DD  au format français DD-MM-YYYY
function datemySQL2fr($date=null) {
	$split = explode("-",$date);
	$annee = $split[0];
	$mois = $split[1];
	$jour = $split[2];
	return "$jour"."-"."$mois"."-"."$annee";
}

######### end fonctions #########
######### various vars ############
$aujourdhui=date("Y-m-d");
$def_jours_affiches=$_GET['def_jours_affiches'];
if(!$def_jours_affiches){
$def_jours_affiches=120; //test to remove
}
/*
 $sql="SELECT * FROM jos_reservations
 LEFT JOIN jos_reservations_details ON jos_reservations.date=jos_reservations_details.date
 WHERE jos_reservations.date >='" .$aujourdhui ."'
 ORDER BY jos_reservations.date LIMIT 0," .($def_jours_affiches*3);
 */

$sql="SELECT * FROM jos_reservations
	WHERE jos_reservations.date >='" .$aujourdhui ."'
	ORDER BY jos_reservations.date LIMIT 0," .($def_jours_affiches*3);


#echo $sql ."<hr>"; //tests
$result=mysql_query($sql);
if(!$result) {
	echo "sql error: " .mysql_error();
	exit;
}
$numberOfRows = mysql_num_rows($result);

if($numberOfRows<1){
	echo "Sorry, no record";
	exit;
}

echo "<h1>Administration des demi-journées
<a href=\"print/\"><img src=\"http://www.p2r.ch/cms/images/cake/print.jpg\" alt=\"imprimer\" title=\"imprimer\"></a>
</h1>
<form method=\"GET\"><select name=\"def_jours_affiches\">
 <option value=\"\">--- Nombre de jours affichés (defaut= " .$def_jours_affiches .")--- </option>
 <option>100</option>
 <option>300</option>
 <option>500</option>
 <option>700</option>
 <option>900</option>
 </select>
 <input type=\"submit\">
 </form>
";

/* bug zarb
 * echo "<h3><a href=\"jos_reservations/add/\">Nouvelle demie-journée</a>
 | <a href=\"jos_reservations/adds/\">Insérer nouvelles demies-journées (paquet)</a>
 | <a href=\"jos_reservations/archiver/\">Archiver demies-journées (paquet)</a>
 </h3>";
 */
echo "<h3><a href=\"add/\">Nouvelle demie-journée</a>
 | <a href=\"adds/\">Insérer nouvelles demies-journées (paquet)</a>
 | <a href=\"archiver/\">Archiver demies-journées (paquet)</a>
 </h3>";
$i=0; $bgColor = "#FFFFFF";
echo "<TABLE>
   <TR>
      <th><B>Date</B></th><th>Matin</th><th>Apr&egrave;s-midi</th><th>Soir</th><th>Livraison</th>
   </TR>";
/*
 *
 * structure de la table
 "id";"date";"type";"nplaces";"REMARQUES"
 */



while($i<$numberOfRows) {

	$x="";

	#fields "id";"date";"type";"nplaces";"statut";"REMARQUES"
		$thisId = mysql_result($result,$i,"id");
		$thisDate = mysql_result($result,$i,"date");
		$dateCourt=datefr_short(ereg_replace(" .*","",$thisDate));
		$thisREMARQUES = mysql_result($result,$i,"REMARQUES");
		$nplaces=mysql_result($result,$i,"nplaces");
		$statut=mysql_result($result,$i,"statut");


	
	//newline
	if(ereg("08:00:00$",$thisDate))	{
		if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#D4FF8F"; }

		$debut= "<tr><td style=\"background-color: " .$bgColor ."\">".datefr_short($thisDate)."</td><td  style=\"background-color: " .$bgColor ."\">";
		#$debut.="<br>BEGIN_LINE<br>";	 //test
		$fin='<br><a href="view/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/loupe.png" alt="Voir" title="Voir"></a>';
		#$fin.='&nbsp;<a href="edit/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/edit.png" alt="Modifier" title="Modifier"></a>';
		#$fin.='&nbsp;<a href="delete/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/delete.png" alt="effacer" title="effacer"></a>';
	}elseif(ereg("14:00:00$",$thisDate))	{
		$debut ="</td><td style=\"background-color: " .$bgColor ."\">";
		#$debut.="<br>NEWCOL<br>";	 //test
		$fin='<br><a href="view/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/loupe.png" alt="Voir" title="Voir"></a>';
		#$fin.='&nbsp;<a href="edit/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/edit.png" alt="Modifier" title="Modifier"></a>';
		#$fin.='&nbsp;<a href="delete/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/delete.png" alt="effacer" title="effacer"></a>';

	}elseif(ereg("17:00:00$",$thisDate))	{
		$debut ="</td><td style=\"background-color: " .$bgColor ."\">";
		#$debut.="<br>NEWCOL<br>";	 //test
		$fin='<br><a href="view/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/loupe.png" alt="Voir" title="Voir"></a>';
		#$fin.='&nbsp;<a href="edit/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/edit.png" alt="Modifier" title="Modifier"></a>';
		#$fin.='&nbsp;<a href="delete/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/delete.png" alt="effacer" title="effacer"></a>';

	}elseif(ereg("18:00:00$",$thisDate))	{
		echo "";
		#$debut.="<br>END_LINE<br>"; //test

		$fin="</td>";

		$fin='<br><a href="view/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/loupe.png" alt="Voir" title="Voir"></a>';
		#$fin.='&nbsp;<a href="edit/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/edit.png" alt="Modifier" title="Modifier"></a>';
		#$fin.='&nbsp;<a href="delete/' .$thisId .'"><img src="http://www.p2r.ch/cms/images/cake/delete.png" alt="effacer" title="effacer"></a>';

		$fin.="</tr>";
	}
	echo $debut;
	#echo "date:";
	#echo $thisDate;

	$sqlUser="SELECT *
FROM `jos_reservations_details`
WHERE `date` = '".$thisDate ."' ORDER BY user";
	#echo $sqlUser; //tests
	$sqlUser=mysql_query($sqlUser);
	$sqlUserN=mysql_num_rows($sqlUser);
	#if($sqlUserN>0) {
if(!$sqlUserN){
	$sqlUserN=0;
}
#echo " # " .$sqlUserN ."<br>"; //tests

	if($sqlUserN==$nplaces){ //le compte est bon
		$color="#00FF00";
		}elseif(($nplaces-$sqlUserN)==1){ //manque un
		$color="#99ff00";
		}elseif(($nplaces-$sqlUserN)==2){ //manque 2
		$color="3ff9900";
		}elseif(($nplaces-$sqlUserN)>=3){ //manque 2
		$color="#FF0000";	//rouge
		}
#	} else {
#	$color="#FF0000";	//rouge
#}
echo "<p style=\"background-color: " .$color ."\">Nombre de places: " .$nplaces ." / inscriptions: " .$sqlUserN ."</p>";

if($sqlUserN>0) {
	$user="";
	echo "<ul>";
	$j=0;
	while($j<$sqlUserN){
		$thisUser = MYSQL_RESULT($sqlUser,$j,"user");
		#$user.="<img src=\"http://www.p2r.ch/cms/images/stories/fruit/strawberry.jpg\" width=\"35\" height=\"25\">";
		#$user.=($j+1) .":";
		$user.="<li>";
		$user.=$thisUser;
		#$user.=",&nbsp;";
		$user.="</li>";
		$j++;
	}
	echo ereg_replace("</li>$","",$user);

}
echo "</ul>";
#if(strlen($thisREMARQUES>0)){
if($thisREMARQUES){
	echo "<br>";
	echo "<em>Remarques: ";
	echo $thisREMARQUES;
	echo "</em>";
}

echo $fin;



$i++;
	}
	echo "</table>";

	echo "<hr>temps calcul: " .ecrire_temps($debut, "4") ." sec";
	?>