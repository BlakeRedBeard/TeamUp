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
		$conn->query($sql)

		$conn->close();
	}

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