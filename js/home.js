
$(document).ready(function(){
	let user;
	document.getElementById('loader').style.display = "inline-block";
	$(function() {
		setTimeout(getData, 1000);
	});
	function getData(){
		$.ajax({
			type: "GET",
			url: "getuser.php",
			async: false,
			success: function(response) {
				if(response){document.getElementById('loader').style.display = "none";}
					user = JSON.parse(response);
					document.getElementById("name").innerHTML = `Hello, ${user.name}`;
				if(!user.name){console.log("user.name");}
				//console.log(response);
			}
		});
	}
	
})