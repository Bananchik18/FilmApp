
var change = {

	initialize : function(){
		var btnRegister = document.getElementById("ChangeRegister")
		var btnLogin = document.getElementById("ChangeLogin")
		console.dir(btnRegister)
		var index = 1;
		var login = document.getElementById("login");
		var register = document.getElementById("register");
		btnRegister.onclick = function(){
			if(index == 1){
				login.style.display = "none";
				register.style.display = "block";
				index = 0;
			}
		}
		
		btnLogin.onclick = function(){
			if(index == 0){
				login.style.display = "block";
				register.style.display = "none";
				index = 1;
			}
		}
		
	}
}

change.initialize();