
var files;
var add = {
   
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },
   
    onDeviceReady: function() {
        this.start();
    },
    start: function(){
        var AddmovieForm = document.getElementById("addmovieform");
        var btnAddMovie = document.getElementById("btnAddMovie");
        var filterform = document.getElementById("filterform");
        var search = document.getElementById("search");
        var formmovie = document.getElementById("formmovie");

        var photo = document.querySelector("input[name='photo'");

         
        $('input[type=file]').on('change', function(){
            files = this.files;
            console.dir(files)
        });

        btnAddMovie.onclick = function(){
          
            if(AddmovieForm.className == "close"){
                AddmovieForm.style.display = "block";
                AddmovieForm.className = "open";
                filterform.style.display = "none";
                search.style.display = "none";
            }else{
               AddmovieForm.className = "close";
               AddmovieForm.style.display = "none"; 
               filterform.style.display = "block";
               search.style.display = "block";
            }
        }
        formmovie.addEventListener('submit' , this.sendmovie.bind(this),false);

    },
    sendmovie: function(e){
         e.preventDefault();
         
        var title = document.querySelector("input[name='title']").value;
        var description = document.querySelector("textarea[name='description']").value
        var year = document.querySelector("input[name='year']").value;
        var time = document.querySelector("input[name='time']").value;
        var genre = document.querySelector("input[name='genre']").value;
        var kinopoisk = document.getElementById("Addkinopoisk").value;
        var imdb = document.getElementById("imdbAdd").value;
        var photo = document.querySelector("input[name='photo'").value;
        
            var data = new FormData();
            console.dir(data);
            $.each( files, function( key, value ){
                data.append( key, value );
            });
            data.append("my_file_upload",1);
            data.append("title",title)
            data.append("description",description)
            data.append("time",time)
            data.append("year",year)
            data.append("genre",genre)
            data.append("kinopoisk",kinopoisk)
            data.append("imdb",imdb)

            $.ajax({
                url: 'http://filmapp.loc/api/add_movie.php',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, 
                contentType: false
            });


            title = "";
            description = "";
            year = "";
            time = "";
            genre = "";
            kinopoisk = "";
            imdb = "";
            photo = "";
       
            // var addmovie = document.getElementById("addmovie");
            // addmovie.style.display = "none";
            // var filterform = document.getElementById("filterform");
            // filterform.style.display = "block";
            // var search = document.getElementById("search");
            // search.style.display = "block";


    }
 
    
};

add.initialize();

