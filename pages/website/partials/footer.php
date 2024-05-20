<?php
$email = "bonjour@socapadi.org";
$email1 = "socapadi@gmail.com";
?>

<footer class="site-footer">
    <img src="/assets/images/icons/footer-bg-icon-1.png" class="site-footer__shape-1" alt="">
    <img src="/assets/images/icons/footer-bg-icon-2.png" class="site-footer__shape-2" alt="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="footer-widget">
                    <a href="index" class="footer-widget__Logo">
                        <img src="/assets/images/logo-light.png" width="153" alt="">
                    </a>
                    <!-- <p class="pb-4">Créer une communauté agro-pastorale durable et résiliente qui harmonise le
                        développement
                        économique avec la conservation de l’environnement
                    </p> -->
                    <!-- <form action="#" data-url="YOUR_MAILCHIMP_URL" class="mc-form">
                        <input type="email" name="EMAIL" placeholder="Email Address">
                        <button type="submit"><i class="agrikon-icon-right-arrow"></i></button>
                    </form>/.mc-form -->
                    <div class="mc-form__response"></div><!-- /.mc-form__response -->
                    <div class="footer__social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div><!-- /.topbar__social -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-sm-12 col-md-6 col-lg-4 -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                <div class="footer-widget footer-widget__links-widget">
                    <h3 class="footer-widget__title">Liens</h3><!-- /.footer-widget__title -->
                    <ul class="list-unstyled footer-widget__links">
                        <li><a href="/about-us">Nous Connaître</a></li>
                        <li><a href="/projects">Nos Projets</a></li>
                        <li><a href="/articles">Nos Articles</a></li>
                        <li><a href="/contact">Nous Contactez</a></li>
                        <!-- <li><a href="#">Volunteers</a></li> -->
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
            <div class="d-none col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="footer-widget">
                    <h3 class="footer-widget__title">Nos Dernières Publications</h3><!-- /.footer-widget__title -->
                    <ul class="list-unstyled footer-widget__post">
                        <li>
                            <img src="/assets/images/resources/footer-post-1.png" alt="">
                            <div class="footer-widget__post-content">
                                <span>Nov 16, 2020</span>
                                <h4><a href="blog-details">How to grow vagetables in the forms</a></h4>
                            </div><!-- /.footer-widget__post-content -->
                        </li>
                        <li>
                            <img src="/assets/images/resources/footer-post-2.png" alt="">
                            <div class="footer-widget__post-content">
                                <span>Nov 16, 2020</span>
                                <h4><a href="blog-details">How to grow vagetables in the forms</a></h4>
                            </div><!-- /.footer-widget__post-content -->
                        </li>
                    </ul><!-- /.list-unstyled footer-widget__post -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <h3 class="footer-widget__title">Contacts</h3><!-- /.footer-widget__title -->
                <ul class="list-unstyled footer-widget__contact">
                    <li>
                        <i class="agrikon-icon-telephone"></i>
                        <a href="tel:<?= $data["website"]["phone"][0] ?>"><?= $data["website"]["phone"][0] ?></a>
                    </li>
                    <li>
                        <i class="agrikon-icon-telephone"></i>
                        <a href="tel:<?= $data["website"]["phone"][1] ?>"><?= $data["website"]["phone"][1] ?></a>
                    </li>
                    <li>
                        <i class="agrikon-icon-email"></i>
                        <a href="mailto:<?= $email ?>"><?= $email ?></a>
                    </li>
                    <li>
                        <i class="agrikon-icon-email"></i>
                        <a href="mailto:<?= $email1 ?>"><?= $email1 ?></a>
                    </li>
                    <li>
                        <i class="agrikon-icon-pin"></i>
                        <a href="#"><?= $data["website"]["adresse"][0] ?></a>
                    </li>
                </ul><!-- /.list-unstyled -->
            </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer><!-- /.site-footer -->
<div class="bottom-footer">
    <div class="container">
        <p>© <?= date('Y') ?> socapadi.org</p>
        <div class="bottom-footer__links">
            <a href="https://kwetutech.com">Powered by Kwetutech</a>
            <!-- <a href="#"></a> -->
            <!-- <a href="#">Sitemap</a> -->
        </div><!-- /.bottom-footer__links -->
    </div><!-- /.container -->
</div><!-- /.bottom-footer -->

</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="far fa-times"></i></span>

        <div class="logo-box">
            <a href="index" aria-label="logo image"><img src="/assets/images/logo-light.png" width="155" alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="agrikon-icon-email"></i>
                <a href="mailto:<?= $email ?>"><?= $email ?></a>
            </li>
            <li>
                <i class="agrikon-icon-telephone"></i>
                <a href="tel:+243813668295">+243813668295</a>
            </li>
            <li>
                <i class="agrikon-icon-telephone"></i>
                <a href="tel:+243997670815">+243997670815</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="d-none mobile-nav__language">
                <img src="/assets/images/resources/flag-1-1.jpg" alt="">
                <label class="sr-only" for="language-select">select language</label>
                <!-- /#language-select.sr-only -->
                <select class="selectpicker" id="language-select">
                    <option value="english">English</option>
                    <option value="arabic">Arabic</option>
                </select>
            </div><!-- /.mobile-nav__language -->
            <div class="mobile-nav__social">
                <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="#" aria-label="pinterest"><i class="fab fa-pinterest-p"></i></a>
                <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->
<?php /*
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup --> */ ?>

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="/assets/js/jquery-3.5.1.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/swiper.min.js"></script>
<script src="/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<script src="/assets/js/bootstrap-select.min.js"></script>
<script src="/assets/js/wow.js"></script>
<script src="/assets/js/odometer.min.js"></script>
<script src="/assets/js/jquery.appear.min.js"></script>
<script src="/assets/js/jarallax.min.js"></script>
<script src="/assets/js/circle-progress.min.js"></script>
<script src="/assets/js/wNumb.min.js"></script>
<script src="/assets/js/nouislider.min.js"></script>

<!-- template js -->
<script src="/assets/js/theme.js"></script>
</body>

</html>