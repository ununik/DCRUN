<?php
class Prihlasky extends Connection
{
	public function getCategories() {
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `category` ORDER BY `rocnik_od` DESC");
		$result->execute(array());
		$all = $result->fetchAll();
	
		return $all;
	}
	public function getPrihlasky($category) {
		$db = parent::connect();
		$result = $db->prepare("SELECT * FROM `prihlasky` WHERE `kategorie` = ? ");
		$result->execute(array($category));
		$all = $result->fetchAll();
	
		return $all;
	}
}