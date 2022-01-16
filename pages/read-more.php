 <?php
    $id = $_GET["id"];
    $selectArticle = $db->prepare("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name WHERE article_id = ?");
    $selectArticle->execute(array($id));
    $articles = $selectArticle->fetchALL(PDO::FETCH_ASSOC); 
    $count = $selectArticle->rowCount();
   
  
    
    $list = selectCategory();
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
  <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content">
                        
                            <?php
                                if($count > 0){
                                    foreach($articles as $article){
                                        ?>
                                             <img src="<?= 'admin/uploads/'.$article['article_img']; ?>" />
                                            <h2><?= $article["article_title"]; ?></h2>
                                            <p><?= $article["article_content"]; ?></p>
                                        <?php
                                    }
                                    // populer articles
                                    if(!$_COOKIE["populer".$id]){
                                        $populer = $db->prepare("UPDATE article SET article_populer = article_populer + 1 WHERE article_id = ?");
                                        $populer->execute(array($id));
                                        setcookie("populer".$id, "_", time() + 9999999);
                                    }
                                 
                                    ?>
                                        <div class="single-tags">
                                            <?php 
                                                foreach($list as $category){
                                                    if($category["category_active"] == 1){
                                                        ?>
                                                            <a href="category?id=<?= $category["category_name"]; ?>"><?= $category["category_name"]; ?></a>
                                                        <?php
                                                    }
                                                    
                                                }
                                            ?>
                                        </div>
                                    <?php

                                    // select comments
                                    $c = $db->prepare("SELECT * FROM comment WHERE comment_article_id = ?");
                                    $c->execute(array($id));
                                    $choose = $c->fetchALL(PDO::FETCH_ASSOC);
                                    $countComment = $c->rowCount();


                                    if(isset($_POST["submit"])){
                                        $name = $_POST["name"];
                                        $email = $_POST["email"];
                                        $commentID = $_POST["commentID"];
                                        $message = $_POST["message"];

                                        $insert = $db->prepare("INSERT INTO comment SET 
                                            comment_user = ?,
                                            comment_email = ?,
                                            comment_article_id = ?,
                                            comment_message = ?
                                        ");
                                        $ok = $insert->execute(array($name, $email, $commentID, $message));
                                        if($ok == true){
                                            echo "<script>
                                                    $.toaster({ message : 'Daxil etdiyiniz comment uqurla gonderildi' });
                                                  </script>";
                                                  $url = $_SERVER["HTTP_REFERER"];
                                                  header("Refresh:2; url=".$url."");
                                        }else{
                                            echo "<script>
                                                    $.toaster({ message : 'Your message here', title : 'Your Title', priority : 'danger' });
                                                  </script>";
                                                 
                                        }

                                    }else{
                                        ?>

                                            <div class="single-related">
                                                <h2>Related Post</h2>
                                                <div class="owl-carousel related-slider">
                                                    <div class="post-item">
                                                        <div class="post-img">
                                                            <img src="./assets/img/post-1.jpg" />
                                                        </div>
                                                        <div class="post-text">
                                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                            <div class="post-meta">
                                                                <p>By<a href="">Admin</a></p>
                                                                <p>In<a href="">Web Design</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-item">
                                                        <div class="post-img">
                                                            <img src="./assets/img/post-2.jpg" />
                                                        </div>
                                                        <div class="post-text">
                                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                            <div class="post-meta">
                                                                <p>By<a href="">Admin</a></p>
                                                                <p>In<a href="">Web Design</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-item">
                                                        <div class="post-img">
                                                            <img src="./assets/img/post-3.jpg" />
                                                        </div>
                                                        <div class="post-text">
                                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                            <div class="post-meta">
                                                                <p>By<a href="">Admin</a></p>
                                                                <p>In<a href="">Web Design</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-item">
                                                        <div class="post-img">
                                                            <img src="./assets/img/post-4.jpg" />
                                                        </div>
                                                        <div class="post-text">
                                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                            <div class="post-meta">
                                                                <p>By<a href="">Admin</a></p>
                                                                <p>In<a href="">Web Design</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-comment">
                                                <h2><?= $countComment; ?> Comments</h2>
                                                <?php
                                                    if($countComment > 0){
                                                        foreach($choose as $comment){
                                                            ?>
                                                            <ul class="comment-list">
                                                               <li class="comment-item">
                                                                   <div class="comment-body">
                                                                       <div class="comment-text">
                                                                           <h3><a href=""><?= $comment["comment_user"]; ?></a></h3>
                                                                           <span><?= $comment["comment_date"]; ?></span>
                                                                           <p>
                                                                              <?= $comment["comment_message"]; ?> 
                                                                           </p>
                                                                           <!--<a class="btn" href="">Reply</a>-->
                                                                       </div>
                                                                   </div>
                                                               </li>
                                                           </ul>
                                                       <?php
                                                        }
                                                       
                                                    }

                                                ?>
                                               
                                            </div>
                                             <div class="comment-form">
                                                <h2>Leave a comment</h2>
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="name">Name *</label>
                                                        <input type="text" name="name" class="form-control" id="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email *</label>
                                                        <input type="email" name="email" class="form-control" id="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="url" class="form-control" id="website">
                                                    </div>

                                                    <div class="form-group">
                                                    <input type="hidden" name="commentID" value="<?= $article["article_id"]; ?>">
                                                        <label for="message">Message *</label>
                                                        <textarea id="message" name="message" cols="30" rows="8" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="submit" value="Post Comment" class="btn custom-btn">
                                                    </div>
                                                </form>
                                            </div> 
                                        <?php
                                    }
                                }else{
                                    
                                    header("Location: blog");
                                }
                               
                            ?>
                           
                        </div>
                       
                        <!-- <div class="single-bio">
                            <div class="single-bio-img">
                                <img src="./assets/img/user.jpg" />
                            </div>
                            <div class="single-bio-text">
                                <h3>Author Name</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.
                                </p>
                            </div>
                        </div>
                        <div class="single-related">
                            <h2>Related Post</h2>
                            <div class="owl-carousel related-slider">
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="./assets/img/post-1.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Admin</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="./assets/img/post-2.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Admin</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="./assets/img/post-3.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Admin</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="./assets/img/post-4.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Admin</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="single-comment">
                            <h2>3 Comments</h2>
                            <ul class="comment-list">
                                <li class="comment-item">
                                    <div class="comment-body">
                                        <div class="comment-img">
                                            <img src="./assets/img/user.jpg" />
                                        </div>
                                        <div class="comment-text">
                                            <h3><a href="">Josh Dunn</a></h3>
                                            <span>01 Jan 2045 at 12:00pm</span>
                                            <p>
                                                Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                            </p>
                                            <a class="btn" href="">Reply</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="comment-item">
                                    <div class="comment-body">
                                        <div class="comment-img">
                                            <img src="./assets/img/user.jpg" />
                                        </div>
                                        <div class="comment-text">
                                            <h3><a href="">Josh Dunn</a></h3>
                                            <p><span>01 Jan 2045 at 12:00pm</span></p>
                                            <p>
                                                Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                            </p>
                                            <a class="btn" href="">Reply</a>
                                        </div>
                                    </div>
                                    <ul class="comment-child">
                                        <li class="comment-item">
                                            <div class="comment-body">
                                                <div class="comment-img">
                                                    <img src="./assets/img/user.jpg" />
                                                </div>
                                                <div class="comment-text">
                                                    <h3><a href="">Josh Dunn</a></h3>
                                                    <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                    <p>
                                                        Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                    </p>
                                                    <a class="btn" href="">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="comment-form">
                            <h2>Leave a comment</h2>
                            <form>
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn custom-btn">
                                </div>
                            </form>
                        </div>  -->
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <div class="search-widget">
                                   
                                        <input class="form-control" name="search" type="text" placeholder="Search Keyword">
                                        <button class="btn"><i class="fa fa-search"></i></button>
                                        <div id="result"></div>
                                    
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Recent Post</h2>
                                <div class="recent-post">
                                <?php
                                        $select = $db->prepare("SELECT * FROM article INNER JOIN category ON article.article_category = category.category_name ORDER BY article_date DESC LIMIT 10");
                                        $select->execute(array());
                                        $row = $select->fetchALL(PDO::FETCH_ASSOC);

                                        foreach($row as $data){
                                            ?>
                                                 <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="<?= 'admin/uploads/'.$data['article_img']; ?>" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href=""><?= $data["article_title"]; ?></a>
                                                        <div class="post-meta">
                                                            <p>By<a href=""><?= $data["article_author"]; ?></a></p>
                                                            <p>In<a href="">Web Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                   
                                   
                                       
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image-widget">
                                    <a href="#"><img src="./assets/img/blog-1.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="tab-post">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-1.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-2.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-3.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-4.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-5.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popular" class="container tab-pane fade">
                                            

                                                <?php
                                                    //populer articles
                                                    $populerArticle = $db->prepare("SELECT * FROM article ORDER BY article_populer DESC limit 5");
                                                    $populerArticle->execute(array());
                                                    $AllPopulerArticle = $populerArticle->fetchALL(PDO::FETCH_ASSOC);

                                                    foreach($AllPopulerArticle as $data){
                                                        ?>
                                                        <div class="post-item">
                                                            <div class="post-img">
                                                                <img src="<?= "admin/uploads/".$data["article_img"]; ?>" />
                                                            </div>
                                                            <div class="post-text">
                                                                <a href="read-more?id=<?= $data['article_id']; ?>"><?= $data["article_title"]; ?></a>
                                                                <div class="post-meta">
                                                                    <p>By<a href="">Admin</a></p>
                                                                    <p>In<a href="">Web Design</a></p>
                                                                </div>
                                                            </div>
                                                    </div>
                                                        <?php
                                                    }


                                                ?>
                                                
                                          
                                            <!-- <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-2.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-3.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-4.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-5.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div id="latest" class="container tab-pane fade">
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-1.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-2.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-3.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-4.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="./assets/img/post-5.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image-widget">
                                    <a href="#"><img src="./assets/img/blog-2.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Categories</h2>
                                <div class="category-widget">
                                    <ul>
                                        <?php
                                        
                                            foreach($list as $category){
                                                $categoryName = $db->prepare("SELECT * FROM article WHERE article_category = ?");
                                                $categoryName->execute(array($category["category_name"]));
                                                $categoryName->fetchALL(PDO::FETCH_ASSOC);
                                                $countCategory = $categoryName->rowCount();
                                                ?>
                                                     <li><a href=""><?= $category["category_name"]; ?></a><span>(<?= $countCategory; ?>)</span></li>
                                                <?php
                                            }
                                        ?>
                                       
                                        <!-- <li><a href="">International</a><span>(87)</span></li>
                                        <li><a href="">Economics</a><span>(76)</span></li>
                                        <li><a href="">Politics</a><span>(65)</span></li>
                                        <li><a href="">Lifestyle</a><span>(54)</span></li>
                                        <li><a href="">Technology</a><span>(43)</span></li>
                                        <li><a href="">Trades</a><span>(32)</span></li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image-widget">
                                    <a href="#"><img src="assets/img/blog-3.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Tags Cloud</h2>
                                <div class="tag-widget">
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Text Widget</h2>
                                <div class="text-widget">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea nec eros. Nunc eu enim non turpis id augue.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Post End--> 
       