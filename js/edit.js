$(document).ready(function(){
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
					var data = JSON.parse(response);
					document.getElementById("name").value = data.name;
					document.getElementById("phone").value = data.phone;
					console.log(data.phone);
					console.log(data.name);
			}
		});
	}

	$('#submit').click( function(event) {
		document.getElementById('loader').style.display = "inline-block";
		let name= $('#name').val()
		let phone= $('#phone').val()
		event.preventDefault()
		$.ajax({
			type: 'POST',
			url:"edit.php",
			data: $('form').serialize(),
			//dataType: "json",
			success:function(r){
				if(r == 1){
					document.getElementById("error").value = "Opps! Something Worng"
					console.log(`"data" ${r}` )
				}
				if(r == 0){
					window.location = "home.html";
					console.log(`"data" ${r}` )
				}
				console.log(`"data" ${r}` )
			}
		})
	  });
})