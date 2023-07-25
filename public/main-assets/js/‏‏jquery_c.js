$(window).on("load" ,function(){
    $(".lds-default").fadeOut(1000,function(){
        $(".loading").fadeOut(1000);
    });
})


$(document).ready(function(){
    $(".btn-dark").click(function(){
        $("body").toggleClass("dark");
    })
})

$(document).ready(function(){
    $(".btn").click(function(){
        $(".btn1").html("تم ارسال الطلب");
    })
})
$(document).ready(function(){
    $(".btn").click(function(){
        $(".btn1").html("تم ارسال الطلب");
    })
})
