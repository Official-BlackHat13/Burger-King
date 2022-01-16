<?php
    $id = $_GET["id"];
    $select = $db->prepare("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name Where article_category = ? ORDER BY article_id DESC");
    $select->execute(array($id));
    $list = $select->fetchALL(PDO::FETCH_ASSOC);
    $count = $select->rowCount();
?>
<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Blog Detail</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
</div>
<!-- Page Header End -->

  <!-- Single Post Start-->
                <div class="blog">
                    <div class="container">
                        <div class="row">
                        <?php
                            if($count > 0){
                                foreach($list as $category){
                                    $comment = $db->prepare("SELECT * FROM comment WHERE comment_article_id = ?");
                                    $comment->execute(array($category["article_id"]));
                                    $comment->fetchALL(PDO::FETCH_ASSOC);
                                    $countComment = $comment->rowCount();
                                    ?>
                                        <div class="col-md-6">
                                            <div class="blog-item">
                                                <div class="blog-img">
                                                    <img src="<?= 'admin/uploads/'.$category['article_img']; ?>" alt="Blog">
                                                </div>
                                                <div class="blog-content">
                                                    <h2 class="blog-title"><?= $category["article_title"]; ?></h2>
                                                    <div class="blog-meta">
                                                        <p><i class="far fa-user"></i><?= $category["article_author"]; ?></p>
                                                        <p><i class="far fa-list-alt"></i><?= $category["article_category"]; ?></p>
                                                        <p><i class="far fa-calendar-alt"></i><?= $category["article_date"]; ?></p>
                                                        <p><i class="far fa-comments"></i><?= $countComment; ?></p>
                                                    </div>
                                                    <div class="blog-text">
                                                        <p>
                                                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                                                        </p>
                                                        <a class="btn custom-btn" href="read-more?id=<?= $category["article_id"]; ?>">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }else {
                                echo "<h2>Hec bir meqale movcud deyil</h2>";
                            }
                           
                        ?> 

                        </div>
                        <!-- <ul class="pagination justify-content-center"> 
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>  -->
                    </div>    
                </div>
               
                   
        
  <!-- Single Post End-->  
          