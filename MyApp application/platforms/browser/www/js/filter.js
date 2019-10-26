var filter = {
   
    initialize: function() {
        document.addEventListener('deviceready', this.start.bind(this), false);
    },

    start: function(){
        var btnShowFilter = document.getElementById("filterbtn");
        var filter = document.getElementById("filter");
        var search = document.getElementById("search")
        var btnAddMovie = document.getElementById("btnAddMovie");
        btnShowFilter.onclick = function(){
           
            if(filter.className == "close"){
                  filter.style.display = "block";
                  filter.className = "open";
                  search.style.display = "none";
                  btnAddMovie.style.display = "none"
            }else{
                  filter.style.display = "none";
                  filter.className = "close";
                  search.style.display = "block";
                  btnAddMovie.style.display = "block"


            }
        }
        var kinopoisk = document.getElementById('kinopoisk');
        var spankinopoisk = document.getElementById('spanKinopoisk');
        var imdb = document.getElementById('imdb');
        var spanimdb = document.getElementById('spanImdb');
        kinopoisk.oninput = function(){          
           spankinopoisk.innerText = kinopoisk.value;
        }
        imdb.oninput = function(){
            spanimdb.innerText = imdb.value;
        }
        var btnFilter = document.getElementById("filterSearch");
        btnFilter.addEventListener('click' , this.searchOnFilter.bind(this));
       
    
    },
    searchOnFilter: function(e){
         e.preventDefault();

        var minYear = document.getElementById('minYear').value;
        var maxYear = document.getElementById('maxYear').value;
        var kinopoisk = document.getElementById('kinopoisk').value;
        var imdb = document.getElementById('imdb').value;
       
        
        // app.setUrl("http://filmapp.loc/api/?year_min="+minYear+"&year_max="+maxYear+"&kinopoisk="+kinopoisk+"&imdb="+imdb);

         var ajax = new XMLHttpRequest();
            ajax.open("GET","http://filmapp.loc/api/?year_min="+minYear+"&year_max="+maxYear+"&kinopoisk="+kinopoisk+"&imdb="+imdb , false);
            ajax.send();
            
        var response = JSON.parse(ajax.responseText);
         console.dir(response);
         // ajax.response == '{"status":"not found"}'
        if(response.status == "not found"){
            alert('film not found')
        }else{
            // showUrl("http://filmapp.loc/api/?year_min="+minYear+"&year_max="+maxYear+"&kinopoisk="+kinopoisk+"&imdb="+imdb);
            urlFilmov = "http://filmapp.loc/api/?year_min="+minYear+"&year_max="+maxYear+"&kinopoisk="+kinopoisk+"&imdb="+imdb;
            app.initialize();
            var filter = document.getElementById("filter");
            var search = document.getElementById("search");
            filter.style.display = "none";
            filter.className = "close";
            search.style.display = "block";    
        }
    }
    
};




