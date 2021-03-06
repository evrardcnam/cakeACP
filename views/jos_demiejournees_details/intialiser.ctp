<?php
/**
* @version        $Id: intialiser.ctp v1.0 28.05.2010 16:44:13 CEST $
* @package        Cocagne
* @copyright      Copyright (C) 2010 - 2014 Open Source Matters. All rights reserved.
* @license        GNU/GPL, see LICENSE.php
* Cocagne is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
Configure::write('debug', 2);
//calcul nbre de jours à générer, à changer dans les valeurs défaut
$njag="SELECT * FROM cocagne_defaults WHERE lib = 'DJ_def_n_jours_initialiser'";
$njag=mysql_query($njag);
if(!$njag) { echo mysql_error(); exit;}
$njag=mysql_result($njag,0,'n');

#############################
//calcul du nombre d'heures par jour
$nhj="SELECT * FROM jos_demiejournees_default_schedules ORDER BY id";
$nhj=mysql_query($nhj);
if(!$nhj) { echo mysql_error(); exit;}
	#on chome le lundi, le mardi, le dimanche: statut=0
$i=0;
while($i<mysql_num_rows($nhj)) {
	if(mysql_result($nhj,$i,'jourheure')=="LundiMatin") {
		$LundiMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="LundiApresMidi") {
		$LundiApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="LundiSoir") {
		$LundiSoir=mysql_result($nhj,$i,'LundiSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="LundiLivraison") {
		$LundiLivraison=mysql_result($nhj,$i,'npers');
		
	} elseif(mysql_result($nhj,$i,'jourheure')=="MardiMatin") {
		$MardiMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="MardiApresMidi") {
		$MardiApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="MardiSoir") {
		$MardiSoir=mysql_result($nhj,$i,'MardiSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="MardiLivraison") {
		$MardiLivraison=mysql_result($nhj,$i,'npers');
	
	} elseif(mysql_result($nhj,$i,'jourheure')=="MercrediMatin") {
		$MercrediMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="MercrediApresMidi") {
		$MercrediApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="MercrediSoir") {
		$MercrediSoir=mysql_result($nhj,$i,'MercrediSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="MercrediLivraison") {
		$MercrediLivraison=mysql_result($nhj,$i,'npers');

	} elseif(mysql_result($nhj,$i,'jourheure')=="JeudiMatin") {
		$JeudiMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="JeudiApresMidi") {
		$JeudiApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="JeudiSoir") {
		$JeudiSoir=mysql_result($nhj,$i,'JeudiSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="JeudiLivraison") {
		$JeudiLivraison=mysql_result($nhj,$i,'npers');

	} elseif(mysql_result($nhj,$i,'jourheure')=="VendrediMatin") {
		$VendrediMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="VendrediApresMidi") {
		$VendrediApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="VendrediSoir") {
		$VendrediSoir=mysql_result($nhj,$i,'VendrediSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="VendrediLivraison") {
		$VendrediLivraison=mysql_result($nhj,$i,'npers');

	} elseif(mysql_result($nhj,$i,'jourheure')=="SamediMatin") {
		$SamediMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="SamediApresMidi") {
		$SamediApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="SamediSoir") {
		$SamediSoir=mysql_result($nhj,$i,'SamediSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="SamediLivraison") {
		$SamediLivraison=mysql_result($nhj,$i,'npers');

	} elseif(mysql_result($nhj,$i,'jourheure')=="DimancheMatin") {
		$DimancheMatin=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="DimancheApresMidi") {
		$DimancheApresMidi=mysql_result($nhj,$i,'npers');
	} elseif(mysql_result($nhj,$i,'jourheure')=="DimancheSoir") {
		$DimancheSoir=mysql_result($nhj,$i,'DimancheSoir');
	} elseif(mysql_result($nhj,$i,'jourheure')=="DimancheLivraison") {
		$DimancheLivraison=mysql_result($nhj,$i,'npers');
	}
	$i++;
}
#############################
/*1st install then comment!!!*/
$jourL=date("D");
$jour=date("d");
$mois=date("m");
$moisL=date("m");
$annee=date("Y");
$tab_jour = array(1 => 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
$datel=date("l jS \of F Y h:i:s A",mktime(0,0,0,$mois,$jour,$annee));
$num_jour = date('N');
$nom_jour = $tab_jour[$num_jour];

#echo "<br>Soit le :" .$datel ." qui est le jour de semaine : " .$nom_jour ."<br>";

/*search existing records
 * */
$lastDate="SELECT * FROM `jos_demiejournees` ORDER BY 'date' DESC";
#echo $lastDate;
$lastDate=mysql_query($lastDate);
$lastDateN=mysql_num_rows($lastDate);
#echo "<br>Total rows: " .$lastDateN ."<br>"; //tests
if(!$lastDate){
	echo "SQL error: " .mysql_error();
	exit;
}

#echo $lastDateN; exit;
//if($lastDateN<1){
	$aujourdhui=date("U");
	$startday=$aujourdhui+(24*3600);
	$test=1;
//} 


/*else {
	#echo "<br>last row: " .($lastDateN-1) ."<br>"; //tests
	#$startday=mysql_result($lastDate,($lastDateN-1),'date');
	$startday=mysql_result($lastDate,0,'date');
	echo "startday: " .$startday; exit;
	$la_date    = explode(' ', $startday); // on decompose la date SQL
	$heure_sql= explode(':',$la_date[1]); // On prend la partie heure
	$heure = $heure_sql[0]; // La variable de l'heure
	$minutes = $heure_sql[1]; // La variable des minutes
	$secondes = $heure_sql[2]; // la variable des secondes
	$date_sql    = explode('-',$la_date[0]); // On prend la partie date
	$annee = $date_sql[0]; // La variable des annees
	$num_mois = $date_sql[1]; // La variable du numero du mois
	$num_jour = $date_sql[2]; // Le numero du jour
	#mktime  ($hour, $minute, $second, $month, $day, $year)
	$startday= date("U", mktime($heure, $minutes, $secondes, $num_mois,$num_jour,$annee ));	 
	#$startday=strftime("U",$startday);
	$startday=$startday+(12*3600); //on ajoute 12h à 18h->lendemain à 8h
	$test=0;
}*/
//echo "startday: ".date("Y-m-d",$startday) ." - ladate: ".$la_date; exit;
################ begin insertion #############
$i=0;
while($i<$njag){
	#on chome le mardi et le dimanche: statut=0
	
	######### MATIN ###########
	$ladate=date("Y-m-d"." 08:00:00",$startday); //matin

	#calcul du jour
	$num_jour = date('N',$startday);
	$nom_jour = $tab_jour[$num_jour];
	# calcul du statut
	#if($nom_jour=="lundi"||$nom_jour=="mardi"||$nom_jour=="dimanche"){
	if($nom_jour=="mardi"||$nom_jour=="dimanche"){
		$statut=0;
	} else {
		$statut=1;
	}	
	#nombre d'heures
	if($nom_jour=="lundi") {
		$nh2do=$LundiMatin;
	} elseif($nom_jour=="mardi") {
		$nh2do=$MardiMatin;
	} elseif($nom_jour=="mercredi") {
		$nh2do=$MercrediMatin;
	} elseif($nom_jour=="jeudi") {
		$nh2do=$JeudiMatin;
	} elseif($nom_jour=="vendredi") {
		$nh2do=$VendrediMatin;
	} elseif($nom_jour=="samedi") {
		$nh2do=$SamediMatin;
	} elseif($nom_jour=="dimanche") {
		$nh2do=$DimancheMatin;
	}

	#calcul SQL
	$ladateS="
	INSERT INTO `jos_demiejournees` (
	`id`, `date`, `type`, `nplaces`, `statut`, `REMARQUES`
	) VALUES (
	NULL , '" .$ladate ."', '', '" .$nh2do ."', '" .$statut ."', ''
	);";
	echo $ladateS ."<br>";//tests
	$ladateSQL=mysql_query($ladateS);
	if(!$ladateSQL){
		echo "Error on ssql query:<br>" .$ladateS ."<br>" .mysql_error();
	}
	
	######### APRES-MIDI ###########
$ladate=date("Y-m-d"." 14:00:00",$startday); //après-midi
	#calcul du jour et du statut
	$num_jour = date('N',$startday);
	$nom_jour = $tab_jour[$num_jour];
	if($nom_jour=="mardi"||$nom_jour=="dimanche"){
		$statut=0;
	} else {
		$statut=1;
	}	
	
		#nombre d'heures
	if($nom_jour=="lundi") {
		$nh2do=$LundiApresMidi;
	} elseif($nom_jour=="mardi") {
		$nh2do=$MardiApresMidi;
	} elseif($nom_jour=="mercredi") {
		$nh2do=$MercrediApresMidi;
	} elseif($nom_jour=="jeudi") {
		$nh2do=$JeudiApresMidi;
	} elseif($nom_jour=="vendredi") {
		$nh2do=$VendrediApresMidi;
	} elseif($nom_jour=="samedi") {
		$nh2do=$SamediApresMidi;
	} elseif($nom_jour=="dimanche") {
		$nh2do=$DimancheApresMidi;
	}

	#calcul SQL
	$ladateS="
	INSERT INTO `jos_demiejournees` (
	`id`, `date`, `type`, `nplaces`, `statut`, `REMARQUES`
	) VALUES (
	NULL , '" .$ladate ."', '', '" .$nh2do ."', '" .$statut ."', ''
	);";
	#echo $ladateS ."<br>";//tests
	$ladateSQL=mysql_query($ladateS);
	if(!$ladateSQL){
		echo "Error on ssql query:<br>" .$ladateS ."<br>" .mysql_error();
	}
	
######### SOIR ###########
$ladate=date("Y-m-d"." 17:00:00",$startday);
	#calcul du jour et du statut
	$num_jour = date('N',$startday);
	$nom_jour = $tab_jour[$num_jour];
#	if($nom_jour=="lundi"||$nom_jour=="mardi"||$nom_jour=="dimanche"){
	if($nom_jour=="mardi"||$nom_jour=="dimanche"){
		$statut=0;
	} else {
		$statut=1;
	}	
	
	#nombre d'heures
	if($nom_jour=="lundi") {
		$nh2do=$LundiSoir;
	} elseif($nom_jour=="mardi") {
		$nh2do=$MardiSoir;
	} elseif($nom_jour=="mercredi") {
		$nh2do=$MercrediSoir;
	} elseif($nom_jour=="jeudi") {
		$nh2do=$JeudiSoir;
	} elseif($nom_jour=="vendredi") {
		$nh2do=$VendrediSoir;
	} elseif($nom_jour=="samedi") {
		$nh2do=$SamediSoir;
	} elseif($nom_jour=="dimanche") {
		$nh2do=$DimancheSoir;
	}
	
		
	#calcul SQL
	$ladateS="
	INSERT INTO `jos_demiejournees` (
	`id`, `date`, `type`, `nplaces`, `statut`, `REMARQUES`
	) VALUES (
	NULL , '" .$ladate ."', '', '" .$nh2do ."', '" .$statut ."', ''
	);";
	#echo $ladateS ."<br>";//tests
	$ladateSQL=mysql_query($ladateS);
	if(!$ladateSQL){
		echo "Error on ssql query:<br>" .$ladateS ."<br>" .mysql_error();
	}
######### LIVRAISON ###########
$ladate=date("Y-m-d"." 18:00:00",$startday);
	#calcul du jour et du statut
	$num_jour = date('N',$startday);
	$nom_jour = $tab_jour[$num_jour];
	#if($nom_jour=="lundi"||$nom_jour=="mardi"||$nom_jour=="dimanche"){
	if($nom_jour=="mardi"||$nom_jour=="dimanche"){
		$statut=0;
	} else {
		$statut=1;
	}	
	
	
	#nombre d'heures
	if($nom_jour=="lundi") {
		$nh2do=$LundiLivraison;
	} elseif($nom_jour=="mardi") {
		$nh2do=$MardiLivraison;
	} elseif($nom_jour=="mercredi") {
		$nh2do=$MercrediLivraison;
	} elseif($nom_jour=="jeudi") {
		$nh2do=$JeudiLivraison;
	} elseif($nom_jour=="vendredi") {
		$nh2do=$VendrediLivraison;
	} elseif($nom_jour=="samedi") {
		$nh2do=$SamediLivraison;
	} elseif($nom_jour=="dimanche") {
		$nh2do=$DimancheLivraison;
	}
			
	#calcul SQL
	$ladateS="
	INSERT INTO `jos_demiejournees` (
	`id`, `date`, `type`, `nplaces`, `statut`, `REMARQUES`
	) VALUES (
	NULL , '" .$ladate ."', '', '" .$nh2do ."', '" .$statut ."', ''
	);";
	#echo $ladateS ."<br>";//tests
	$ladateSQL=mysql_query($ladateS);
	if(!$ladateSQL){
		echo "Error on ssql query:<br>" .$ladateS ."<br>" .mysql_error();
	}
	$i++; //on increment le compteur
	$startday=$startday+(24*3600); //on ajoute un jour
}

	#header("Location: " .$_SERVER["HTTP_REFERER"]); //return to previous page
	exit();
?>
