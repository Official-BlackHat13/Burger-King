$(document).ready(function(){
    $(".aktivePassive").click(function(){
        var id = $(this).attr("id");
        var aktive = $(this).is(":checked") ? 1 : 0;
        
        $.ajax({
            type: "POST",
            url: "pages/active.php",
            data: {
                "id": id,
                "aktive": aktive,
            },
            success: function(e){

            }
        })
    })
    // active category
    $(".category-active").click(function(){
        var categoryId = $(this).attr("id");
        var categoryActive = $(this).is(":checked") ? 1 : 0;
       
        $.ajax({
            type: "POST",
            url: "pages/active.php",
            data: {
                "categoryId": categoryId,
                "categoryActive": categoryActive,
            }
        })
    })

    // active article
    $(".active_article").click(function(){
        var articleId = $(this).attr("id");
        var articleActive = $(this).is(":checked") ? 1 : 0;

        $.ajax({
            type: "POST",
            url: "pages/active.php",
            data: {
                "articleId": articleId,
                "articleActive": articleActive,
            }
        })
    })
})