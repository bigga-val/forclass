<?php
	if(isset($upload_img)){
		$PDO = new PDO("mysql:host=localhost; dbname=examen", "root", "");
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$req = $PDO->prepare("INSERT INTO users(login, password, adresse, role_id) VALUES(:log, :pwd, :adr, :role)");
		$req->execute(array("log"=>$login, "pwd"=>$password, "adr"=>$adresse, "role"=>$role));
		}
		catch(PDOExeption $e){
			echo $e->getMessage();
		}
	}	
?>