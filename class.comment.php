<?php
	/**
	 * 
	 */
	class Commentaire
	{
		public $id;
		public $id_user;
		public $commentaire;
		public $id_categorie;
		public $date_comment;
		
		function __construct($id, $id_user, $commentaire, $id_categorie, $date_comment)
		{
			$this->id = $id;
			$this->id_user = $id_user;
			$this->commentaire = $commentaire;
			$this->id_categorie = $id_categorie;
			$this->date_comment = $date_comment;
		}
		public function afficher_commentaire(){
			$PDO = new PDO("mysql:host=localhost; dbname=examen", "root", "");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$req = $PDO->prepare("SELECT commentaires.id, commentaires.commentaire, users.login, categorie.nom_categorie, commentaires.comment_date FROM users, commentaires, categorie WHERE commentaires.id_user=users.id and commentaires.id_categorie = categorie.id ORDER BY commentaires.comment_date ASC");
			$req->execute();
			$liste = array ();
	        if($req != NULL)
	        {
	            while($objet = $req->fetch(PDO::FETCH_OBJ))
	            {
	                $p=new Commentaire($objet->id, $objet->login, $objet->commentaire, $objet->nom_categorie, $objet->comment_date);
	                $liste[]=$p;
	            }
	        }
	        return $liste;
			}
			public function creer_commentaire($user, $commentaire, $categorie){
				try{
			$PDO = new PDO("mysql:host=localhost; dbname=examen", "root", "");
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$req = $PDO->prepare("INSERT INTO commentaires(id_user, commentaire, id_categorie) VALUES(:user, :commentaire, :categorie)");
			$req->execute(array("user"=>$user, "commentaire"=>$commentaire, "categorie"=>$categorie));
			}
			catch(PDOExeption $e){
				echo $e->getMessage();
			}
			}
	}
?>