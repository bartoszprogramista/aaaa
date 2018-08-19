
$(document).ready(function(){
var licznik = 2;
      $("#pierwszy").click(function(){
         console.log(licznik);
         if(licznik%2===0){
            $("#lewo").toggle("slow");
            $("#prawo").removeClass("col-lg-12");
            $("#prawo").addClass("col-lg-9");

            licznik++;
            return false;
         }else{
            $("#lewo").hide("slow");
            setTimeout(function (){
               $("#prawo").removeClass("col-lg-9");
               $("#prawo").addClass("col-lg-12");

            }, 490);

            licznik++;
            return false;
         }

   });





});
