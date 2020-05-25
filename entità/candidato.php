<?php

class candidato{
	//Dichiarazione Attributi	 
	private $mailUtente;
	private $progettoID;
	private $accettato;
	private $curriculum;



	//Definizione Metodi
	public function __construct($array){
		$this->mailUtente = $array['mailUtente'];
		$this->progettoID = $array['progettoID'];
		if(array_key_exists('accettato', $array))
			$this->accettato = $array['accettato'];

		if(array_key_exists('curriculum', $array))
			$this->curriculum = $array['curriculum'];
	}


	public function getMail(){
		return $candidato->mailUtente;
	}

	public function getID(){
		return $candidato->progettoID;
	}

	public function getAccettato(){
		return $candidato->accettato;
	}

	public function getCurriculum(){
		return $candidato->curriculum;
	}

}


?>