var login = {
   
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },  
    onDeviceReady: function() {
        this.start();
    },

    start: function(){
        
        loginform.addEventListener("submit" ,this.getlogin.bind(this), false);
    },
    getlogin: function(event){
    event.preventDefault()
    var login = document.getElementById("login");
    var loginform = document.getElementById("loginform");

    var ajaxlogin = new XMLHttpRequest();
    ajaxlogin.open("GET" , loginform.action , false);
    ajaxlogin.send();


    var GetLoginAjax = JSON.parse(ajaxlogin.responseText);    
    var users = GetLoginAjax.users;
    console.dir(users);

    var inputlogin = document.getElementById("inputlogin").value;
    var inputpassword = document.getElementById("inputpassword").value;


    var statusLogin = document.getElementById("statusLogin");
    var btnAddMovie = document.getElementById("btnAddMovie");
    for(var i = 0 ; i < users.length;i++){
        if(inputlogin == users[i].username && inputpassword == users[i].password){
            
            if(users[i].role != "admin"){
                btnAddMovie.style.display = "none";
            }else{
                btnAddMovie.style.display = "block";
            }
            var app = document.getElementById("app");
            app.style.display = "block";
            login.style.display = "none";

        }else{
            statusLogin.style.display = "block";
        }
    }
    
    }
    
};

login.initialize();

