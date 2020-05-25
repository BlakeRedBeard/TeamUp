<?php

class utente{
	//Dichiarazione Attributi	 
	private $mail;
	private $password;
	private $nome;
	private $cognome;
	private $descrizione;
	private $nascita;
	private $immagine;
	private $curriculum;


	//Definizione Metodi
	public function __construct($array){
		$this->mail = $array['mail'];
		$this->password = $array['password'];
		$this->nome = $array['nome'];
		$this->cognome = $array['cognome'];
		$this->descrizione = $array['descrizione'];
		if(array_key_exists('nascita', $array))
			$this->nascita = $array['nascita'];

		if(array_key_exists('immagine', $array))
			$this->immagine = $array['immagine'];

		if(array_key_exists('curriculum', $array))
			$this->curriculum = $array['curriculum'];
	}

	public function getMail(){
		return $this->utente->mail;
	}

	public function getPassword(){
		return $this->utente->password;
	}

	public function getNome(){
		return $this->utente->nome;
	}

	public function getCognome(){
		return $this->utente->cognome;
	}

	public function getDescrizione(){
		return $this->utente->descrizione;
	}

	public function getNascita(){
		return $this->utente->nascita;
	}

	public function getImmagine(){
		return $this->utente->immagine;
	}

	public function getCurriculum(){
		return $this->utente->curriculum;
	}


}


?>