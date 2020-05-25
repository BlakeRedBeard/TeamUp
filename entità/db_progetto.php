<?php

require 'progetto.php';

class db_progetto{

	//dichiarazione attributi
	private $progetto;

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

	public function register($project){
		$this->progetto = new progetto($project);
		$conn = $this->getConnection();
		$sql = "INSERT INTO progetto (leader, nome, descrizione, data_scadenza, data_creazione) VALUES ".
		"('".$this->progetto->leader."', '".$this->progetto->nome."', '".$this->progetto->descrizione."', '".$this->progetto->data_scadenza."', '".$this->progetto->data_creazione."')";
		$conn->query($sql);

		$conn->close();
	}


	public function setProgetto($id){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM progetto WHERE id = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $progetto = new progetto($row);
		}

		$progetto = new progetto($row);
		$conn->close();
		
	}

	public function getProgetto(){
		return $this->progetto;
	}

}

/*	Testing della classe

	$array = array( "leader" => "gaetano@mail.it",
					"nome" => "The simp king",
					"descrizione" => "sciam a femmn",
					"data_scadenza" => "2020-05-29",
					"data_creazione" => "2020-05-24");

	$interface = new db_progetto();
	$interface->register($array);

*/

?>