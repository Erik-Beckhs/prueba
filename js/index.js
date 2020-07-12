$(window).on("hashchange", function(){
    if(location.hash.slice(1)=="registro")
    {
        $(".card").addClass("extend");
        $("#login").removeClass("selected");
        $("#registro").addClass("selected");
    }
    else {
        $(".card").removeClass("extend");
        $("#login").addClass("selected");
        $("#registro").removeClass("selected");
    }
});
$(window).trigger("hashchange");