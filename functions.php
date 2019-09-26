<?php
	/* Configure le script en français */
	setlocale (LC_TIME, 'fr_FR','fra');
	//Définit le décalage horaire par défaut de toutes les fonctions date/heure  
	date_default_timezone_set("Europe/Paris");
	//Definit l'encodage interne
	mb_internal_encoding("UTF-8");
	//Convertir une date US en françcais
	function dateFr($date){
		return strftime('%d-%m-%Y',strtotime($date));
	}
?>