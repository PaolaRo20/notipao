function obtenerclima() {
    // 8454e484d215dca443b8ba3c45ae9aaf
    $.ajax({
        url: "https://api.openweathermap.org/data/2.5/weather?lat=6.244203&lon=-75.581215&appid=8454e484d215dca443b8ba3c45ae9aaf&lang=es",
        method: "get"
    }).done(function(respuesta){
        $('.ciudad').text(respuesta.name);
        $('.clima').text(respuesta.weather[0].description);
        console.log(respuesta);
    });
}

function obtenernoticias() {
    // aa61b89ba0e5465cacdf190cf786c932
    // https://newsapi.org/v2/everything?q=Apple&from=2022-03-29&sortBy=popularity&apiKey=API_KEY

    // $.ajax({
    //     url: "https://newsapi.org/v2/top-headlines?country=co&apiKey=aa61b89ba0e5465cacdf190cf786c932",
    //     method: "get"
    // }).done(function(respuesta){
    //     console.log(respuesta);
    // });

}

function currentTime() {
    let date = new Date(); 
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session = "AM";
  
    if(hh == 0){
        hh = 12;
    }
    if(hh > 12){
        hh = hh - 12;
        session = "PM";
     }
  
     hh = (hh < 10) ? "0" + hh : hh;
     mm = (mm < 10) ? "0" + mm : mm;
     ss = (ss < 10) ? "0" + ss : ss;
      
     let time = hh + ":" + mm + ":" + ss + " " + session;
  
    document.querySelector(".reloj").innerText = time; 
    let t = setTimeout(function(){ currentTime() }, 1000);
  }
  

  $(document).ready(function(){
    currentTime();
    obtenerclima();
    obtenernoticias();
  });