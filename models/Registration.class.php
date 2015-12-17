<?php
class Registration extends Connection
{
	private $name = '';
	private $year = '';
	private $club = '';
	private $email = '';
	private $poznamka = '';
	private $pohlavi = 'm';
	private $category = '1';
	private $err = "";
	
	public function safeText($text){
		return htmlspecialchars(addslashes($text));
	}
	public function mandatory($text, $pole){
		if($text == ""){
			$this->err .= "<li>$pole je povinné pole.</li>";
		}
	}
	public function lenth255($text, $pole){
		if(strlen($text) > 255){
			$this->err .= "<li>$pole je příliš dlouhé.</li>";
		}
	}
	public function  validateEMAIL($EMAIL) {
	    $v = "/^[_a-zA-Z0-9\.\-]+@[_a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,6}+$/";
	
	    return (bool)preg_match($v, $EMAIL);
	}
	
	public function getName() {
		return $this->name;
	}
	public function setName($new){
		$this->name = $this->safeText($new);
		$this->mandatory($this->name, 'Jméno a příjmení');
		$this->lenth255($this->name, 'Jméno a příjmení');
	}
	
	public function getPohlavi() {
		return $this->pohlavi;
	}
	public function setPohlavi($new){
		$this->pohlavi = $this->safeText($new);
		$this->mandatory($this->pohlavi, 'Pohlaví');
	}

	public function getYear() {
		return $this->year;
	}
	public function setYear($new){
		$this->year = $this->safeText($new);
		$this->mandatory($this->year, 'Rok narození');
		if(strlen($this->year) != 4 || $this->year < 1900 || $this->year > 2016){
			$this->err .= "<li>Rok narození může obsahovat jen 4 číslice (od 1900 do 2016).</li>";
		}
	}

	public function getClub() {
		return $this->club;
	}
	public function setClub($new){
		$this->club = $this->safeText($new);
		$this->lenth255($this->club, 'Klub');
	}

	public function getEmail() {
		return $this->email;
	}
	public function setEmail($new){
		$this->email = $this->safeText($new);
		$this->lenth255($this->email, 'Email');
		if($new != ""){
			if($this->validateEMAIL($this->email) == false){
				$this->err .= "<li>Špatný formát emailu.</li>";
			}
		}
	}
	

	public function getPoznamka() {
		return $this->poznamka;
	}
	public function setPoznamka($new){
		$this->poznamka = $this->safeText($new);
	}
	
	public function getCategories($pohlavi) {
			$db = parent::connect();
			$result = $db->prepare("SELECT * FROM `category` WHERE `pohlavi`=?  ORDER BY `rocnik_od` DESC");
			$result->execute(array($pohlavi));
			$all = $result->fetchAll();
		
			return $all;
	}
	public function save() {
		$db = parent::connect();
		$timestamp = time();
		$result = $db->prepare("INSERT INTO `prihlasky`(`jmeno_prijmeni`, 
														`rocnik`, 
														`pohlavi`, 
														`kategorie`, 
														`klub`, 
														`email`, 
														`poznamka`, 
														`timestamp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$result->execute(array($this->name, $this->year, $this->pohlavi, $this->category, $this->club, $this->email, $this->poznamka, $timestamp));
	}
	
	public function setCategory($new){
		$this->category = $this->safeText($new);
	}
	public function getCategory(){
		return $this->category;
	}
	
	public function gerErr(){
		return $this->err;
	}
}