$(document).ready(function(){
	$("#error").fadeOut();
	/* validation */
	$("#change-form").validate({
		rules:
		{
			op: {
				required: true,
				//minlength: 8,
				maxlength: 15
			},
			np: {
				required: true,
				//minlength: 8,
				maxlength: 15
			},
			c_np: {
				required: true,
				//minlength: 8,
				maxlength: 15
			},
		},
		messages:
		{
			op:{
				required: "Old Password is required",
				minlength: "Password Needs To Be Minimum of 8 Characters"
			},
			np:{
				required: "New Password is required",
				minlength: "Password Needs To Be Minimum of 8 Characters"
			},
			c_np:{
				required: "The confirmation password required",
				minlength: "Password Needs To Be Minimum of 8 Characters"
			},
		},
		submitHandler: submitForm
	})
	
	/* handle form submit */
	function submitForm(event) {
		let data = $("form").serialize();
		let np= $('#np').val()
		let c_np= $('#c_np').val()
		if(np !== c_np){ 
			console.log("The confirmation password  does not match")
		}else{
			document.getElementById('loader').style.display = "inline-block";
			$.ajax({
				type: 'POST',
				url: 'change-p.php',
				data: data,
				beforeSend: function () {
					$("#error").fadeOut();
				},
				success: function (data) {
					if(data == 2){
						document.getElementById('error').innerHTML = "Old password was Wrong"
					}
					else if(data == 0){
						window.location = "home.html";
					}else if(data == 1){
						$("#error").fadeIn();
						document.getElementById('error').innerHTML = "Try again";
					}else if(data == 3){
						$("#error").fadeIn();
						document.getElementById('error').innerHTML = "Old password was Wrong";
					}
					console.log(data)
				}
			});
		}
		return false;
	}
})
