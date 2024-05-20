<div class="preloader">
    <img class="preloader__image" height="100" src="/assets/images/loader.png" alt="">
</div><!-- /.preloader -->
<div class="gtranslate_wrapper"></div>
<div class="page-wrapper">
    <header class="main-header">
        <div class="topbar">
            <div class="container">
                <div class="topbar__left">
                    <div class="topbar__social">
                        <a href="#" class="fab fa-facebook-square"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-pinterest-p"></a>
                        <a href="#" class="fab fa-instagram"></a>
                    </div><!-- /.topbar__social -->
                    <p>Bienvenue à la <?= $data["website"]["name"] ?></p>
                </div><!-- /.topbar__left -->
                <div class="topbar__right">
                    <a href="#"><i class="agrikon-icon-email"></i><?= $data["website"]["email"] ?></a>
                    <a href="#"><i class="agrikon-icon-clock"></i>Lun - Ven 8:00 - 16:00, Weekend - FERMÉ</a>
                </div><!-- /.topbar__right -->
            </div><!-- /.container -->
        </div><!-- /.topbar -->
        <nav class="main-menu">
            <div class="container">
                <div class="logo-box">
                    <a href="index" aria-label="logo image"><img src="/assets/images/logo-dark.png" width="153" alt=""></a>
                    <span class="fa fa-bars mobile-nav__toggler"></span>
                </div><!-- /.logo-box -->
                <ul class="main-menu__list">
                    <li class="">
                        <a href="/">Acceuil</a>
                        <!-- <ul>
                            <li>
                                <a href="index">Home One</a>
                            </li>
                            <li><a href="index-2">Home Two</a></li>
                            <li class="dropdown">
                                <a href="#">Header Styles</a>
                                <ul>
                                    <li><a href="index">Header One</a></li>
                                    <li><a href="index-2">Header Two</a></li>
                                </ul>
                            </li>
                        </ul> -->
                    </li>
                    <li class="dropdown">
                        <a href="#">Apropos de Nous</a>
                        <ul>
                            <li><a href="/vision-mission">Vision, Mission & Objectifs</a></li>
                            <li><a href="/staff">Staff</a></li>
                            <!-- <li><a href="service-details">Service Details</a></li> -->
                            <li><a href="/contact">Nous Contacter</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Domaines d'Intervention</a>
                        <ul>
                            <li><a href="/service-1">Sécurité alimentaire et agriculture durable</a></li>
                            <li><a href="/service-2">Environnement et gestion des ressources naturelles</a></li>
                            <!-- <li></li> -->
                        </ul>
                        <!-- <li class="dropdown"><a href="/services">Domaines d'Intervention</a>
                    
                    </li> -->
                    </li>
                    <li class="dropdown">
                        <a href="#">Projets</a>
                        <ul>
                            <li><a href="/projects-realises">Projets Réalisés</a></li>
                            <li><a href="/projects-encours">Projets En Cours</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Publications</a>
                        <ul>
                            <li><a href="/articles">Articles</a></li>
                            <li><a href="/rapports">Rapports</a></li>
                            <li><a href="/actualites">Actualités</a></li>
                            <li><a href="/autres">Autres</a></li>
                        </ul>
                    </li>
                    <!-- </li> -->

                </ul>
                <!-- /.main-menu__list -->

                <div class="main-header__info">
                    <!-- <a href="#" class="search-toggler main-header__search-btn"><i
                            class="agrikon-icon-magnifying-glass"></i></a> -->
                    <a class="main-header__cart-btn" href="#"></i></a>
                    <a href="tel:<?= $data["website"]["phone"][0] ?>" class="main-header__info-phone">
                        <i class="agrikon-icon-phone-call"></i>
                        <span class="main-header__info-phone-content">
                            <span class="main-header__info-phone-text">Applez Nous ur</span>
                            <span class="main-header__info-phone-title"><?= $data["website"]["phone"][0] ?></span>
                        </span><!-- /.main-header__info-phone-content -->
                    </a><!-- /.main-header__info-phone -->
                </div><!-- /.main-header__info -->
            </div><!-- /.container -->
        </nav>
        <!-- /.main-menu -->
    </header><!-- /.main-header -->
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->