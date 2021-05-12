$(document).ready(function(){
	$("#error").fadeOut();
	/* validation */
	$("#register-form").validate({
		rules:
		{
			name: {
				required: true
			},
			email: {
				required: true
			},
			phone: {
				required: true,
				minlength: 10,
				//maxlength: 15
			},
			password: {
				required: true,
				//minlength: 8,
				maxlength: 15
			},
			re_password: {
				required: true,
				//minlength: 8,
				maxlength: 15
			},
		},
		messages:
		{
			name:{
				required: "Name is required"
			},
			email:{
				required: "email is required"
			},
			phone:{
				required: "Phone Number is required",
				minlength: "Password Needs To Be Minimum of 10 Characters"
			},
			password:{
				required: " password required",
				maxlength: "Password Needs To Be Maximum of 15 Characters"
			},
			re_password:{
				required: "The confirmation password required",
				maxlength: "Password Needs To Be Maximum of 15 Characters"
			},
		},
		submitHandler: submitForm
	})
	
	/* handle form submit */
	function submitForm() {
		let data = $("form").serialize();
		let password= $('#password').val()
		let re_password= $('#re_password').val()
		if(password !== re_password){ 
			console.log("The confirmation password  does not match")
		}else{
			$.ajax({
				type: 'POST',
				url: 'signup-check.php',
				data: data,
				beforeSend: function () {
					$("#error").fadeOut();
				},
				success: function (data) {
					if(data){
						$("#error").fadeIn();
						document.getElementById("error").innerHTML = data;
					}if(data == 0){
						$("#error").fadeOut();
						window.location = "index.html";
					}
					console.log(data)
				}
			});
		}
		return false;
	}
})