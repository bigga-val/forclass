<?php
require_once("Membre.class.php");
require_once("class.categorie.php");
require_once("class.comment.php");
extract($_POST);
extract($_GET);

if(isset($enregistrer_modif))
	{
	echo $id, $login, $password, $adresse;
	Membre::modifier_utilisateur($id, $login, $password, $adresse);
	header("Location: dashboard.php");
	}
if(isset($identifiant))
	{
	echo $identifiant;
	Membre::supprimer_utilisateur($identifiant);
	//header("Location: dashboard.php");
	}
if(isset($creer_utilisateur))
	{
	Membre::creer_utilisateur($login, $password, $adresse, $role);
	header("Location: dashboard.php");
	}
if(isset($creer_categorie))
	{
	Categorie::creer_categorie($nom_categorie);
	header("Location: publications.php");
	}
if(isset($creer_commentaire))
	{
	echo $user . $commentaire.$categorie;
	Commentaire::creer_commentaire($user, $commentaire, $categorie);
	header("Location: publications.php");
	}
?>