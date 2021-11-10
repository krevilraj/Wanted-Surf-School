// Close NAv
var $ = jQuery.noConflict();



$( "#burgurMenu" ).click(function() {
    document.getElementById("navbar").style.width="100%";
});

$( "#closeNav" ).click(function() {
    document.getElementById("navbar").style.width= "0";
});



// for cart javascript

function openCart(){
    document.getElementById("cart-detail").style.display="block";
}


// aos animation Initialize

AOS.init();


// 1 2 3 4 5 6 7
//
// 8 src

// 1. click garey paxi tesko img link samatnu paryo

// image link src

$(document).ready(function(){

    $(".background__img img").hover(function(){
        $image_link = $(this).attr('src');
        $(".zoom__img").attr('src', $image_link);
    })
});