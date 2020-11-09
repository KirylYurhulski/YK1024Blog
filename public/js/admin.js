window.onload = function(){
    $(".formDelete").on("submit", function(){
        return confirm("Are you sure?");
    });
}
