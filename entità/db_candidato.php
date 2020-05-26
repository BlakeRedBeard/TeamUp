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

	//UPDATE QUERIES
	public function updateMail($oldMail, $newMail){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET mail = '".$newMail."' WHERE mail LIKE '".$oldMail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateID($mail, $newID){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET ID = '".$newID."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateAccettato($mail, $newAccettato){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET Accettato = '".$newAccettato."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateCurriculum($mail, $newCurriculum){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET Curriculum = '".$newCurriculum."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}
	//END UPDATE QUERIES

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