var urlFilmov = "http://filmapp.loc/api/?year_min=1900&year_max=2018&kinopoisk=0&imdb=0";

var app = {
   
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },

    // url : "http://filmapp.loc/api/?year_min=1900&year_max=2018&kinopoisk=0&imdb=0",

    setUrl: function(link) {
        // this.url = link;
    },   
    onDeviceReady: function() {
        this.start();
        this.getFilm();

        filter.initialize();
    },

    start: function(){
       var btnSearch = document.querySelector("#btnSearch");

        btnSearch.addEventListener('click', this.getFilm.bind(this))
       
        
    },
    getFilm: function(){
        
        var ajax = new XMLHttpRequest();

            ajax.open("GET", urlFilmov , false);
            console.dir("--------------------------------------")
            ajax.send();
            console.dir(ajax)


         var response = JSON.parse(ajax.responseText);
         console.dir(response);

        var films = response.films;
        console.dir(films);
        this.generateInfo(films[random(0, films.length - 1)]);
        


        //console.dir();
    },
    generateInfo: function(info){

        var infoBlock = document.getElementById('info');
            infoBlock.innerText = "";
        var Name = document.createElement("h2");
            Name.innerText = "Название : "+info.title;
        var Year = document.createElement("p");
            Year.innerText = "Год : "+info.year;
        var Janre = document.createElement("p");
            Janre.innerText = "Жанр : "+info.genre;
        var time = document.createElement("p");
            time.innerText = "Время : "+info.time + " минут";
        var Descriprion = document.createElement("p");
            Descriprion.innerText = "Описание : "+info.description;
        var kinopoisk = document.createElement("p");
            kinopoisk.innerText = "Kinopoisk : "+info.kinopoisk;
        var imdb = document.createElement("p");
            imdb.innerText = "Imdb : "+info.imdb;
        var img = document.createElement("img");
            img.src = info.photo;

        infoBlock.appendChild(Name);
        infoBlock.appendChild(Year);
        infoBlock.appendChild(Janre);
        infoBlock.appendChild(time)
        infoBlock.appendChild(Descriprion);
        infoBlock.appendChild(kinopoisk);
        infoBlock.appendChild(imdb);
        infoBlock.appendChild(img);
    }
    
};

app.initialize();

    function random (min, max){
        var rand = min + Math.random() * (max + 1 - min);
        rand = Math.floor(rand);
        return rand;
    }




