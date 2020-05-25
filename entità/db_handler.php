<?php
require 'utente.php';
require 'progetto.php';
require 'candidato.php';


class db_handler{
	//Dichiarazione Attributi	 
	private $utente;
	private $progetto;
	private $candidato;

	public function __construct(){
		$this->utente = new utente();
		$this->progetto = new progetto();
		$this->candidato = new candidato();
	}


	public function getConnection(){
		$servername = "localhost";
		$username = "root";
		$password = "Admin";
		$dbname = "db_ing";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		return $conn;
	}





}


?>