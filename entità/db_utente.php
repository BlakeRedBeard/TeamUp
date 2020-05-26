<?php

require 'utente.php';

class db_utente{

	//dichiarazione attributi
	private $utente;

	//Definizione Metodi
	private function getConnection(){
			$servername = "localhost";
			$username = "root";
			$password = "Admin";
			$dbname = "db_ing";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			return $conn;
	}

	public function register($user){
		$this->utente = new utente($user);
		$conn = $this->getConnection();
		$sql = "INSERT INTO utente (mail, password, nome, cognome, descrizione) VALUES ".
		"('".$this->utente->mail."', '".$this->utente->password."', '".$this->utente->nome."', '".$this->utente->cognome."', '".$this->utente->descrizione."')";
		$conn->query($sql);

		$conn->close();
	}

	//UPDATE QUERIES
	public function updateMail($oldMail, $newMail){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET mail = '".$newMail."' WHERE mail LIKE '".$oldMail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updatePassword($mail, $newPassword){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET password = '".$newPassword."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateNome($mail, $newNome){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET nome = '".$newNome."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateCognome($mail, $newCognome){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET cognome = '".$newCognome."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateDescrizione($mail, $newDescrizione){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET descrizione = '".$newDescrizione."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateNascita($mail, $newNascita){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET nascita = '".$newNascita."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateImmagine($mail, $newImmagine){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET immagine = '".$newImmagine."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateCurriculum($mail, $newCurriculum){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET curriculum = '".$newCurriculum."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}
	//END UPDATE QUERIES



	public function setUtente($mail){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM utente WHERE mail LIKE '".$mail."'";
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $this->utente = new utente($row);
		}

		$this->utente = new utente($row);
		$conn->close();
		
	}

	public function getUtente(){
		return $this->utente;
	}



}

/*	Testing della classe
	//test funzione register()
	{
			$array = array( "mail" => "gaetano@mail.it",
							"password" => "simp123",
							"nome" => "gaetano",
							"cognome" => "cassano",
							"descrizione" => "I\'m gay");

			$interface = new db_utente();
			$interface->register($array);
	}

	

*/

?>