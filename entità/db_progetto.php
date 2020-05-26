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

	//UPDATE QUERIES
	public function updateID($oldID, $newID){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET ID = '".$newID."' WHERE ID LIKE '".$oldID."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateLeader($mail, $newLeader){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Leader = '".$newLeader."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateNome($mail, $newNome){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET nome = '".$newNome."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateDescrizione($mail, $newDescrizione){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Descrizione = '".$newDescrizione."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateData_scadenza($mail, $newData_scadenza){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Data_scadenza = '".$newData_scadenza."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateData_creazione($mail, $newData_creazione){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Data_creazione = '".$newData_creazione."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updateds
		}
	}

	public function updateCandidatura($mail, $newCandidatura){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Candidatura = '".$newCandidatura."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateNumero_candidati($mail, $newNumero_candidati){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Numero_candidati = '".$newNumero_candidati."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateRicercabile($mail, $newRicercabile){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET Ricercabile = '".$newRicercabile."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}
	//END UPDATE QUERIES


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