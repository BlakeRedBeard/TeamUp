<?php

require 'candidato.php';

class db_candidato{

	//dichiarazione attributi
	private $candidato;

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

	public function register($candidate){
		$this->candidato = new candidato($candidate);
		$conn = $this->getConnection();
		$sql = "INSERT INTO candidato (MailUtente, ProgettoID) VALUES ".
		"('".$this->candidato->mailUtente."', '".$this->candidato->progettoID."')";
		$conn->query($sql);

		$conn->close();
	}

	public function setCandidato($mail, $id){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE mailutente LIKE \'".$mail."\' AND progettoid = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $candidato = new candidato($row);
		}

		$candidato = new candidato($row);
		$conn->close();
		
	}

	public function getCandidato(){
		return $this->candidato;
	}



}

	
	$array = array( "mailUtente" => "gaetaano@mail.it",
					"progettoID" => "2");

	$interface = new db_candidato();
	$interface->register($array);



?>