/*
This function makes a AJAX request to send to sqldata.php
by using get method by sending ?key=<the word>
The sqldata.php responds by giving the list of the NGO

*/


function getNGO(var keyWord){
	var ngoName="";


	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(this.readyState==4 & this.status==200){
			ngoName= this.responseText;
	}

	xmlhttp.open("GET","sqldata.php?key=" + keyWord,true);
	xmlhttp.send();
};