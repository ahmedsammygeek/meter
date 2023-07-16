// jq for owl carousel
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
        0:{
            items:1,
            nav:true,
            loop :true,
        },
        600:{
            items:2,
            nav:false,
            loop :true,
            autoplay:true,
            autoplayTimeout:2500,
            autoplayHoverPause:true
        },
        1000:{
            items:4,
            nav:true,
            loop:true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        }
        }
    });
    $(".sub-btn").click(function(){
        $(this).next('.sub-menu').slideToggle();
    });
});

// ==============================================
// js for wrap-header to change the backgroundimg

// let wrapheader = document.querySelector(".wrap-header");

// let imgsArray = ["slide_1.jpg" , "slide_2.jpg" , "slide_3.jpg"];


// setInterval(()=>{

//     var randomimg = Math.floor(Math.random() * imgsArray.length);

//     wrapheader.style.backgroundImage = 'url("img/' + imgsArray[randomimg] +  ' ")';


// } , 2000)

// ==============================================
// js for scroll to top

var scroll = document.querySelector(".scroll");

window.onscroll = function(){

    if(window.scrollY >= 500){

        scroll.classList.add("show");

    }

    else{

        scroll.classList.remove("show");

    }
}

scroll.onclick = function(){

    window.scrollTo({

        top : 0 ,

        behavior : "smooth"

    })

}

// ===========================================
//  js for product details slider 

var mainimg = document.getElementById("mainimg");

var smallimg = document.getElementsByClassName("small-img");

smallimg[0].onclick = function(){
    mainimg.src = smallimg[0].src;
}
smallimg[1].onclick = function(){
    mainimg.src = smallimg[1].src;
}
smallimg[2].onclick = function(){
    mainimg.src = smallimg[2].src;
}
smallimg[3].onclick = function(){
    mainimg.src = smallimg[3].src;
}