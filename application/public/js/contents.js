/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var x;
x = $(document);
x.ready(entrada);
$(window).load(function() {
            $('.flexslider').flexslider({
                controlsContainer: '.flex-container'
            });
          });
function entrada(){
    var x;
    x=$("#contingutsVols"); //aqui el id vols
    x.hover(entramouse,salemouse);
    var y=$("#contingutsHotels");
    y.hover(entramouse,salemouse);
    var z=$("#contingutsOfertes");
    z.hover(entramouse,salemouse);
    x.click(redir);
    y.click(redir);
    z.click(redir);
   
    
}

function entramouse(){
    
    $(this).css("background-color","#ff0000");
}
function salemouse(){
     $(this).css("background-color","#ff7070");
}
function redir(){
    window.location.href="http://localhost/scratch/Res"
}
