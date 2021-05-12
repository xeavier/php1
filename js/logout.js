$(document).ready(function(){
	let x = document.cookie;
	function getCookie(name) {
		const value = `; ${document.cookie}`;
		const parts = value.split(`; ${name}=`);
		if (parts.length === 2) return parts.pop().split(';').shift();
	  }
	if(getCookie('username')){
		  document.getElementById("uname").value = getCookie('username').replace(/%20/g, " ");
	}
	if(getCookie('password')){
		document.getElementById("password").value = getCookie('password').replace(/%20/g, " ");
  }
	

if(document.cookie) {
	document.cookie = 'name' +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
	console.log(x);
	$('#submit').click( function(event) {
		$.ajax({
			type: 'POST',
			url:"logout.php",
			//dataType: "json",
			success:function(r){
				if (r.indexOf("Location: index.html") > -1){window.location = "home.html"}
			}
		})
	  });
})