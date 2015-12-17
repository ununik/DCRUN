<?php

function __autoload($name){
	include_once ("models/$name.class.php");
}
$html = new Html();
include('controllers/navigation.php');

if(isset($_GET['page']) && $_GET['page'] != ""){
	$html->setPage($_GET['page']);
	if(isset($_GET['subpage']) && $_GET['subpage'] != ""){
		$html->addSubpage($_GET['subpage']);
	}
}else{
	$html->setPage('home');
}

if(file_exists($html->getPageController())){ include ($html->getPageController()); } else include('controllers/nopagefound.php');

$html->addCss('<link rel="stylesheet" href="views/css/page.css" type="text/css" media="screen">');
$html->addCss("<link href='https://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css'>");
$html->addToFooter("Martin Přibyl | ununik[at]gmail.com | 2015");

$html->addToTopLink('<a href="" target="_blank" title="FACEBOOK">FACEBOOK</a>');
$html->addToTopLink('<a href="" target="_blank" title="Fotogalerie">Fotogalerie</a>');
$html->addToTopLink('<a href="http://chlum1.webnode.cz/" target="_blank" title="Běh na Chlum">Běh na Chlum</a>');
$html->addToTopLink('<a href="http://decin.kaes.cz/" target="_blank" title="KS Děčín">KS Děčín</a>');
$html->addToTopLink('<a href="index.php?page=partneri" title="Partneři">Partneři</a>');

print include_once("views/page.php");