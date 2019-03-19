var current = 0;
var max = $("li").length;

$(".btn-next").click(function(){
    var nextIndex = current === max-1 ? 0 : current + 1;
    $("#image_slider li").eq(current).removeClass("active");
    $("#image_slider li").eq(nextIndex).addClass("active");

    current = nextIndex;
});

$(".btn-prev").click(function(){
    var prevIndex = current === 0 ? max-1 : current - 1;
    $("#image_slider li").eq(current).removeClass("active");
    $("#image_slider li").eq(prevIndex).addClass("active");
    current = prevIndex;
});