function setCategoryPohlavi(input){
	pohlavi = input.value;
	if(pohlavi == "f"){
		document.getElementById('category_women').style.display = "block";
		document.getElementById('category_men').style.display = "none";
	}else{
		document.getElementById('category_women').style.display = "none";
		document.getElementById('category_men').style.display = "block";
	}	
}