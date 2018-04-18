<!DOCTYPE html>
<html>

<head>
	<title>  </title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="container">
		
		<div id="sites">
			<h2> WebSites </h2>
			<p id="websites"></p>
		</div>

		<div id="usuaria">
			<label for="username"> Username: </label>
			<input type="text" name="username" id="username" value="Samantha">

			<label for="email"> Email: </label>
			<input type="text" name="email" id="email">
		</div>

		<div id="hemisferio">
			<h2> Total de Usuários do Hemisfério Sul </h2>
			<p id="sul"></p>
			<p id="total"></p>
		</div>

	</div>

	<script>

		var i, total = 0;
		var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {

	    	if (this.readyState == 4 && this.status == 200) {

	        	var Dados = JSON.parse(this.responseText);

				for(i in Dados){
	        		document.getElementById("websites").innerHTML += Dados[i].website + "<br>";

	        		if(Dados[i].username == "Samantha")
	        			document.getElementById("email").value = Dados[i].email;

	        		if(Dados[i].address.geo.lat < 0){
	        			document.getElementById("sul").innerHTML += Dados[i].name + "<br>";

	        			total += 1;

	        			document.getElementById("total").innerHTML = "Total: " + total + " usuários";
	        		}
				}
	    	}
		};
		xmlhttp.open("GET", "https://jsonplaceholder.typicode.com/users", true);
		xmlhttp.send();

	</script>

</body>
</html>

