<?php
$html->setH1('PŘIHLÁŠKY');
$html->addTitle("Přihlášky");
$html->addCss('<link rel="stylesheet" href="views/css/registration.css" type="text/css" media="screen">');
$html->addScript('<script src="js/registration.js"></script>');
$registration = new Registration();
$saved = "";
if(isset($_GET['saved']) && $_GET['saved'] == 1){
	$saved = "Přihláška byla odeslána.";
}
$category_men = $registration->getCategories('m');
$category_women = $registration->getCategories('f');
if(isset($_POST['name'])){
	$registration->setName($_POST['name']);
	$registration->setPohlavi($_POST['pohlavi']);
	$registration->setYear($_POST['year']);
	$registration->setClub($_POST['club']);
	$registration->setEmail($_POST['email']);
	$registration->setPoznamka($_POST['poznamka']);
	if($registration->getPohlavi() == "m"){
		$registration->setCategory($_POST['category_m']);
	}else{
		$registration->setCategory($_POST['category_w']);
	}
	
	if($registration->gerErr() == ""){
		$registration->save();
		header('Location: index.php?page=registration&saved=1');
	}
}
$list = include 'controllers/registration/list.php';
$html->addToContent(include('views/registration/form.php'));