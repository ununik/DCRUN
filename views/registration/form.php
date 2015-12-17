<?php
$container = "<div id='list'>";
$container .= "<h3>Seznam prihlasenych</h3>";

$container .= $list;

$container .= "</div><div id='form'><h3>Registrace</h3>";

$container .= "$saved";

$container .= "<ul>{$registration->gerErr()}</ul>";

$container .= "<form action='index.php?page=registration' method='post'>";

$container .= "<div class='form'>
				Jmeno a prijmeni *
				<input type='text' placeholder='Jmeno a prijmeni' value='{$registration->getName()}' name='name'>
				</div>";

$container .= "<div class='form'>
				Rocnik narozeni *
				<input type='text' placeholder='Rocnik narozeni' value='{$registration->getYear()}' name='year'>
				</div>";

$container .= "<div class='form'>
				Pohlavi *
				<input type='radio' name='pohlavi' value='m' onchange='setCategoryPohlavi(this)' ";
				if($registration->getPohlavi() == "m"){
					$container .= 'checked';
				}
				
$container .= "><input type='radio' name='pohlavi' value='f'  onchange='setCategoryPohlavi(this)' ";
				if($registration->getPohlavi() == "f"){
					$container .= 'checked';
				}
				
$container .= "></div>";

$container .= "<div class='form'>
				Kategorie
				<select id='category_men' name='category_m' ";
					if($registration->getPohlavi() == "f"){ $container .= "style='display: none;'";}
				$container .= ">";
				foreach ($category_men as $man){
					$container .= "<option value='{$man['id']}' ";
					if($man['id'] == $registration->getCategory() ) { $container .= "selected"; }
					$container .= ">{$man['nazev']} ({$man['trat']})";
				}
$container .= "</select>
				<select id='category_women' name='category_w' ";
					if($registration->getPohlavi() == "m") { $container .= "style='display: none;'";}
				$container .= ">";
				foreach ($category_women as $woman){
					$container .= "<option value='{$woman['id']}' ";
					if($woman['id'] == $registration->getCategory() ){ $container .= "selected"; }
					$container .= ">{$woman['nazev']} ({$woman['trat']})";
				}
$container .= "</select>
				</div>";

$container .= "<div class='form'>
				Klub
				<input type='text' placeholder='Klub' value='{$registration->getClub()}' name='club'>
				</div>";

$container .= "<div class='form'>
				Email
				<input type='text' placeholder='Email' value='{$registration->getEmail()}' name='email'>
				</div>";

$container .= "<div class='form'>
				Poznamka
				<textarea name='poznamka'>{$registration->getPoznamka()}</textarea>
				</div>";

$container .= "<div class='form'>
				<input type='submit' value='Odeslat prihlasku'>
				</div>";

$container .= "</form>";

$container .= "<div>* Povinna pole.</div>";

return $container;