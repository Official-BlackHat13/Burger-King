<?php 
    $select = $db->prepare("SELECT * FROM settings");
     $select->execute(array());
     $x = $select->fetchALL(PDO::FETCH_ASSOC);
    /*  echo '<pre>';
     print_r($x);
     echo '</pre>';
     die(); */
    
     
?>
 <!-- Nav Bar Start -->
 
 <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">  
            <?php
                foreach($x as $data){
                    ?>
                        <a href="" class="navbar-brand"><?= $data["logo"];?> <span> <?= $data["logo_2"];?></span></a>
                    <?php
                }
                 
            ?>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="home" class="nav-item nav-link <?php
                         if($page == 'home'){echo 'active';} 
                         if($page == ""){echo 'active';}
                         ?>">Home</a>
                        <a href="about" class="nav-item nav-link <?php if($page == 'about'){echo 'active';} ?>">About</a>
                        <a href="feature" class="nav-item nav-link <?php if($page == 'feature'){echo 'active';} ?>">Feature</a>
                        <a href="team" class="nav-item nav-link <?php if($page == "team"){echo 'active';} ?>">Chef</a>
                        <a href="menu" class="nav-item nav-link <?php if($page == 'menu'){echo 'active';} ?>">Menu</a>
                        <a href="booking" class="nav-item nav-link <?php if($page == 'booking'){echo 'active';} ?>">Booking</a>
                        <a href="blog" class="nav-item nav-link <?php if($page == 'blog'){echo 'active';} ?>">Blog</a>
                       <!--  <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="blog" class="dropdown-item <?php if($page == 'blog'){echo 'active';} ?>">Blog Grid</a>
                                <a href="single" class="dropdown-item <?php if($page == 'single'){echo 'active';} ?>">Blog Detail</a>
                            </div>
                        </div> -->
                        <a href="contact" class="nav-item nav-link <?php if($page == 'contact'){echo 'active';} ?>">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
      