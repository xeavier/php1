$('document').ready(function () {
	$("#error").fadeOut();
if(localStorage.getItem('email')) {
	document.getElementById("email").value = localStorage.getItem('email');
}if(document.getElementById("password")){
	document.getElementById("password").value = localStorage.getItem('password');
}
$("#register-form").validate({
	rules:
	{
		password: {
			required: true,
			//minlength: 8,
			maxlength: 15
		},
		email: {
			required: true,
			email: true
		},
	},
	messages:
	{
		password:{
			required: "Provide a Password",
			minlength: "Password Needs To Be Minimum of 8 Characters"
		},
		email: "Enter a Valid Email"
	},
	submitHandler: submitForm
});
	/* handle form submit */
	function submitForm() {
		document.getElementById('loader').style.display = "inline-block";
		let data = $("form").serialize();
	    	if ($('#remember').is(":checked"))
               {
				  		localStorage.setItem('email', document.getElementById("email").value);  
		                localStorage.setItem('password', document.getElementById("password").value);
         }
		$.ajax({
			type: 'POST',
			url: 'login.php',
			data: data,
			beforeSend: function () {
				$("#error").fadeOut();
				$("#submit").fadeOut();
				document.getElementById('loader').style.display = "inline-block";
			},
			success: function (data) {
				if (data == 0) {
					window.location = "home.html";
					 console.log(data) 
					}
					if (data == 1) {
						$("#error").fadeIn();
						$("#submit").fadeIn();
			        	document.getElementById('loader').style.display = "none";
						document.getElementById("error").innerHTML = "INVALID username and password";
						 console.log(data) 
						}
				console.log(data)
			}
		});
		return false;
	}
});