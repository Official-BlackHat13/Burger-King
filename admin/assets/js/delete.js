$(document).ready(function(){
   $(".delete-category").click(function(e){
        e.preventDefault();
        var id = $(this).closest("tr").find(".category_id").val();
        
        Swal.fire({
            title: 'Bu elementi silmek isteyirsiniz?',
            text: "Eger bu elementi silerseniz geri qaytarma mumkun olmuyacaq!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Beli!',
            cancelButtonText: "Leqv et"
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                  type: "POST",
                  url: "pages/delete-category.php",
                  data: {
                      "delete_btn_set": 1,
                      "id": id,
                  },
                  success: function(response){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Silme uqurla sonlandi',
                        showConfirmButton: false,
                        timer: 1500
                      }).then((result) => {
                          location.reload();
                      })
                  }
              })
            }
          })
   });
   // delete article 
   $(".delete-article").click(function(e){
      e.preventDefault();
      var articleId = $(this).closest("tr").find(".delete_article_id").val();
        Swal.fire({
          title: 'Bu elementi silmek isteyirsiniz?',
          text: "Eger bu elementi silerseniz geri qaytarma mumkun olmuyacaq!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Beli!',
          cancelButtonText: "Leqv et"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "pages/delete-category.php",
                data: {
                    "articleID": articleId,
                },
                success: function(response){
                  Swal.fire({
                      position: 'top-center',
                      icon: 'success',
                      title: 'Silme uqurla sonlandi',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) => {
                        location.reload();
                    })
                }
            })
          }
        })
        })
        //delete cheaf
        $(".delete_chef").click(function(e){
            e.preventDefault();
            var chefId = $(this).closest("tr").find(".delete_chef_id").val();
            var deleteChefImg = $(this).closest("tr").find("#delete_chef_img").val();
            
            
            Swal.fire({
              title: 'Bu elementi silmek istediyinden eminsen?',
              text: "Eger bu elementi silersen geri qaytarmaq mumkun olmuyacaq!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: "POST",
                  url: "pages/delete-category.php",
                  data: {
                    "chefId": chefId,
                    "deleteChefImg": deleteChefImg,
                  },
                  success: function(response){
                    Swal.fire({
                      position: 'top-center',
                      icon: 'success',
                      title: 'Silme uqurla heyata kecdi',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) =>{
                      location.reload();
                    })
                  }
                })
              }
            })
        })
  })