var app = {
   
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },

    addUserForm: document.getElementById("registerForm"),
    onDeviceReady: function() {
        this.start();
    },

    start: function(){
          this.addUserForm.addEventListener('submit' , this.senduser.bind(this) , false);
    },
    senduser: function(e){

       e.preventDefault();
        var ajaxuseradd = new XMLHttpRequest();
            ajaxuseradd.open("POST" , this.addUserForm.action , false)

        var inputlogin = document.getElementById('registerlogin').value;
        var inputemail = document.getElementById('registeremai').value;
        var inputpassword = document.getElementById('registerpassword').value;

        var sendvalue = "login="+inputlogin+"&email="+inputemail+"&password="+inputpassword+"&role='user'";
        ajaxuseradd.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            ajaxuseradd.send(sendvalue);

        var login = document.getElementById("login");
        var register = document.getElementById("register");

        login.style.display = "block";
        register.style.display = "none";
    }

    
};

app.initialize();


