<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only"><?php echo $english['search']; ?></label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
            
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="../"><?php echo $english['home']; ?></a>
                    </li>
                    <li>
                        <a href="catagories.php"><?php echo $english['categories']; ?></a>
                         <ul>
                            <?php
                              LoadCategories($conn,$_SESSION['lang']);
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a href="app/productv1.php" class="sf-with-ul"><?php echo $english['zones']; ?></a>
                            <ul>
                                <li><a href="zones.php?zone=red" class="bg-danger text-white text-center"><?php echo $english['red_zone_products']; ?></a></li>
                                <li><a href="zones.php?zone=orange" class="bg-warning text-dark text-center"><?php echo $english['orange_zone_products']; ?></a></li>
                                <li><a href="zones.php?zone=green" class="bg-success text-white text-center"><?php echo $english['green_zone_products']; ?></a></li>
                                <!-- <li><a href="#" ><?php //echo $english['completed_products_zone']; ?> </a></li> -->
                                <!-- <li><a href="#" ><?php //echo $english['incompleted_products_zone']; ?></a></li> -->
                            </ul>
                    </li>
                    <li>
                        <a href="productsvall.php"><?php echo $english['products']; ?></a>
                    </li>
                    <li>
                        <a href="faq.php"><?php echo $english['faq']; ?></a>
                    </li>
                    <li>
                        <a href="#"><?php echo $english['company']; ?></a>
                            <ul>
                                <li><a href="dashboard.php"><?php echo $english['my_accout']; ?></a></li>
                                <li><a href="about.php" ><?php echo $english['about']; ?></a></li>
                                <li><a href="contact.php" ><?php echo $english['contact']; ?></a></li>
                                <li><a href="services.php" ><?php echo $english['services']; ?></a></li>
                                <li><a href="faq.php" ><?php echo $english['faq']; ?></a></li>
                            </ul>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->