<?php
	class Hallgato{
		private $nev;
		private $kor;
		
	 public function __construct($nev,$kor) {
		$this->nev = $nev;
		$this->kor = $kor;
	}
	
	public function getNev() {
      return $this->nev;
		}
	
	public function getKor() {
      return $this->kor;
		}

	}
	
	class WebtervetHallgato extends Hallgato{
		private $kedvencTargy;
		
	 public function __construct($nev, $kor, $kedvencTargy) {
		parent::__construct($nev, $kor);
		$this->kedvencTargy = $kedvencTargy;
	 }
	
	public function kiirat(){
		echo parent::getNev()."	". parent::getKor()." éves és a kedvenc tárgya a: ".$this->kedvencTargy."<br>"; 
	}


	}

	
	$bence= new WebtervetHallgato("Bence","19","WEBTERV");
	$ricsi= new WebtervetHallgato("Ricsi","19","KALK I.");
	
	$bence->kiirat();
	$ricsi->kiirat();
	
	echo "<a href=\"index.html\">Vissza a főoldalra...</a>";
	
	
?>