$(function(){
     function getParameterByName(name) {
         name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
         var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
         results = regex.exec(location.search);
         return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
     }
     var envio = getParameterByName('id');
     $.ajax({
          type:'GET',
          url:'php/articulo.php',
          data: ('id='+envio),
          success: function(resp){
               if(resp!=''){
                    $('#resultados').html(resp);
               }
          }
     })

})
