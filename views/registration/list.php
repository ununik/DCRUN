<?php
$cont = "<table id='prihlaseni'>";
foreach ($prihlasky->getCategories() as $category){
	$cont .= "<tr><th colspan='3' class='category'>{$category['nazev']}</th></tr>";
	$cont .= "<tr class='popis'><td>Jméno</td><td>Ročník</td><td>Klub</td></tr>";
	foreach ($prihlasky->getPrihlasky($category['id']) as $prihlaska){
		$cont .= "<tr class='prihlaska_row'><td>{$prihlaska['jmeno_prijmeni']}</td><td>{$prihlaska['rocnik']}</td><td>{$prihlaska['klub']}</td></tr>";
	}
}
$cont .= "</table>";

return $cont;