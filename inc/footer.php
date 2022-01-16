<!-- Footer Start -->
<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="footer-contact">
                                <h2>Our Address</h2>
                                <p><i class="fa fa-map-marker-alt"></i>
                                    <?php
                                        $select = $db->prepare("SELECT * FROM settings");
                                        $select->execute(array());
                                        $writing = $select->fetchALL(PDO::FETCH_ASSOC);
                                        foreach($writing as $data){
                                        ?>
                                            <?= $data["address"];?>
                                        <?php
                                        }

                                    ?>
                                     </p>      
                                                
                                                <p><i class="fa fa-phone-alt"></i>
                                        <?php
                                        foreach($writing as $data){
                                            ?>
                                                <?= $data["phone"];?>
                                            <?php
                                        }
                                        ?>
                                                
                                        </p>
                                        <p><i class="fa fa-envelope"></i>
                                        <?php
                                        foreach($writing as $data){
                                            ?>
                                                <?= $data["mail"];?>
                                            <?php
                                        } 
                                        ?>
                                                
                                        </p>
                                                <div class="footer-social">

                                                    <a href="https://twitter.com" target="_blank">
                                                    <?php
                                                        foreach($writing as $data){
                                                            ?>
                                                                <i class="<?= $data['s_tw'];?>"></i>
                                                            <?php
                                                        }
                                                        
                                                    ?>
                                                    </a>
                                                    <a href="https://facebook.com" target="_blank">
                                                    <?php
                                                        foreach($writing as $data){
                                                            ?>
                                                                <i class="<?= $data["s_fb"];?>"></i>
                                                            <?php
                                                        }
                                                    ?>
                                                    </a>
                                                    <a href="https://www.youtube.com" target="_blank">
                                                    <?php
                                                        foreach($writing as $data){
                                                            ?>
                                                                <i class="<?= $data["s_yt"];?>"></i>
                                                            <?php
                                                        }
                                                    ?>
                                        
                                                    </a>
                                                    <a href="https://instagram.com" target="_blank">
                                                    <?php
                                                        foreach($writing as $data){
                                                            ?>
                                                                <i class="<?= $data["s_ins"];?>"></i>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                    </a>
                                                    <a href="https://www.linkedin.com" target="_blank">
                                                    <?php
                                                        foreach($writing as $data){
                                                            ?>
                                                                <i class="<?= $data["s_in"];?>"></i>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                    </a>
                                                </div>
                                            </div>             
                            </div>
                            <div class="col-md-6">
                                <div class="footer-link">
                                    <h2>Quick Links</h2>
                                    <a href="">Terms of use</a>
                                    <a href="">Privacy policy</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <p>
                                Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                            </p>
                            <div class="form">
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn custom-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>