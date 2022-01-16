$(document).ready(function(){
    $("#result").hide();
    $("input[name=search]").keyup(function(){
        var value = $(this).val();
        
        $.ajax({
            type: "post",
            url: "pages/search.php",
            data: {"value": value,},
            success: function(result){
                $("#result").show().html(result);
            }
        })
    })
})