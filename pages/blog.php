<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    

      <!-- Page Header Start -->
      <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Food Blog</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        <!-- Pagenation start -->
          <?php
            $InPage = 4;
            $query = $db->query("SELECT * FROM article ORDER BY article_id DESC");
            $query->execute(array());
            $totalArticle = $query->rowCount();
            $totalPage = ceil($totalArticle/$InPage);
            
            $sayfa = isset($_GET["sayfa"]) ? (int) $_GET["sayfa"] : 1;
            if($sayfa < 0) $sayfa = 1;
            if($sayfa > $totalPage) $sayfa = $totalPage;
            $limit = ($sayfa - 1) * $InPage;
          ?>
        <!-- Pagination end -->


        <?php
            // select article blog from database
            $list = selectArticle($limit, $InPage);
        ?>

     <!-- Blog Start -->
     <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Food Blog</p>
                    <h2>Latest From Food Blog</h2>
                </div>
                <div class="row">
                <?php
                    foreach($list as $article){
                        $comment = $db->prepare("SELECT * FROM comment WHERE comment_article_id = ?");
                        $comment->execute(array($article["article_id"]));
                        $comment->fetchALL(PDO::FETCH_ASSOC);
                        $countComment = $comment->rowCount();
                            //active article
                            
                            if($article["category_active"] == 1){
                                if($article["article_active"] == 1){
                                    ?>
                                    <div class="col-md-6">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <img src="<?= "admin/uploads/".$article["article_img"]; ?>" alt="Blog">
                                            </div>
                                            <div class="blog-content">
                                                <h2 class="blog-title"><?= $article["article_title"]; ?></h2>
                                                <div class="blog-meta">
                                                    <p><i class="far fa-user"></i><?= $article["article_author"]; ?></p>
                                                    <p><i class="far fa-list-alt"></i><?= $article["article_category"]; ?></p>
                                                    <p><i class="far fa-calendar-alt"></i><?= substr($article["article_date"],0, -9); ?></p>
                                                    <p><i class="far fa-comments"></i><?= $countComment; ?></p>
                                                </div>
                                                <div class="blog-text">
                                                    <p><?= substr($article["article_content"], 0, 250); ?></p>
                                                    <a class="btn custom-btn" href="read-more?id=<?= $article['article_id']; ?>">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            
                            
                        }
                          
                            
                            
                        
                            
                       
                        
                   
                ?>
                    <!--  <div class="col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="./assets/img/blog-2.jpg" alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                                <div class="blog-meta">
                                    <p><i class="far fa-user"></i>Admin</p>
                                    <p><i class="far fa-list-alt"></i>Food</p>
                                    <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                                    <p><i class="far fa-comments"></i>10</p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                                    </p>
                                    <a class="btn custom-btn" href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="./assets/img/blog-3.jpg" alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                                <div class="blog-meta">
                                    <p><i class="far fa-user"></i>Admin</p>
                                    <p><i class="far fa-list-alt"></i>Food</p>
                                    <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                                    <p><i class="far fa-comments"></i>10</p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                                    </p>
                                    <a class="btn custom-btn" href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="./assets/img/blog-4.jpg" alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                                <div class="blog-meta">
                                    <p><i class="far fa-user"></i>Admin</p>
                                    <p><i class="far fa-list-alt"></i>Food</p>
                                    <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                                    <p><i class="far fa-comments"></i>10</p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                                    </p>
                                    <a class="btn custom-btn" href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>  -->
                </div>
                <div class="row">
                    <div class="col-12">
                    <ul class="pagination justify-content-center">
                        <?php
                            $s = 0;
                            while($s < $totalPage){
                                $s++;
                                if($sayfa == $s){
                                    ?>
                                    <li class="page-item active"><a class="page-link" href="blog?sayfa=<?= $s; ?>"><?= $s; ?></a></li>
                                     <?php
                                }else{
                                    ?>
                                    <li class="page-item"><a class="page-link" href="blog?sayfa=<?= $s; ?>"><?= $s; ?></a></li>
                                    <?php
                                }
                               
                            }
                        ?>
                    </ul> 
                       <!--  <ul class="pagination justify-content-center"> 
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

  
</body>
</html>