<?php
require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="/">Acceuil</a></li>
            <li>/</li>
            <li><span>Appropos de Nous</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2>Staff</h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="p-10">
    <div class="container">
        <div class="col ">
            <div class="col">
                <div class=" p-4">
                    <div class="text-center">
                        <!-- <p>Notre Equipe</p> -->
                        <h1 class="">Notre Equipe</h1>
                    </div><!-- /.block-title -->
                    <div class="text-center">
                        <p>La SOCAPADI fonctionne grâce à la collaboration entre ses membres, son conseil
                            d’administration et son personnel, tous travaillant ensemble pour atteindre les objectifs
                            collectifs.</p>
                    </div><!-- /.team-one__summery -->
                </div><!-- /.col-md-12 col-lg-5 -->
            </div><!-- /.row -->
        </div>
        <div class="container p-4 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center gap">
                <?php if (isset($data['data']['staff'])) : ?>
                    <?php foreach ($data['data']['staff'] as $staff) : ?>
                        <div class="col-8 col-lg-4 col-md-5 d-flex align-items-center justify-content-center">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="/assets/images/team/<?= $staff['cover'] ?>" alt="<?= $staff['nom'] ?>">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3 class='btn' data-bs-toggle="modal" data-bs-target="#exampleModal<?= $staff['id'] ?>">
                                    <?= $staff['nom'] ?></h3>
                                <p><?= $staff['role'] ?></p>
                            </div><!-- /.team-card -->
                        </div>
                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal<?= $staff['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $staff['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel<?= $staff['id'] ?>"><?= $staff['nom'] ?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body container">
                                        <div class="row justify-content-center">
                                            <div class="col-auto col-lg d-flex align-items-center justify-content-center">
                                                <div class="team-card">
                                                    <div class="team-card__image">
                                                        <img src="/assets/images/team/<?= $staff['cover'] ?>" alt="<?= $staff['nom'] ?>">
                                                        <div class="team-card__social">
                                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                                        </div><!-- /.team-card__social -->
                                                    </div><!-- /.team-card__image -->
                                                    <h3 class='btn' data-bs-toggle="modal" data-bs-target="#exampleModal<?= $staff['id'] ?>">
                                                        <?= $staff['nom'] ?></h3>
                                                    <p><?= $staff['role'] ?></p>
                                                </div><!-- /.team-card -->
                                            </div>
                                            <p class="col-auto col-lg d-flex align-items-center justify-content-center">
                                                <?= $staff['resume'] ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
</section>
<?php /*<section class="team-one">
    <img src="/assets/images/icons/team-bg-1-1.png" alt="" class="team-one__bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5">
                <div class="team-one__content">
                    <div class="block-title">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <p>Notre Equipe</p>
                        <h3>Le Staff</h3>
                    </div><!-- /.block-title -->
                    <div class="team-one__summery">
                        <p>La SOCAPADI fonctionne grâce à la collaboration entre ses membres, son conseil
                            d’administration et son personnel, tous travaillant ensemble pour atteindre les objectifs
                            collectifs.</p>
                    </div><!-- /.team-one__summery -->

                    <!-- If we need navigation buttons -->
                    <div class="team-one__nav">
                        <div class="swiper-button-prev" id="team-one__swiper-button-next"><i class="agrikon-icon-left-arrow"></i>
                        </div>
                        <div class="swiper-button-next" id="team-one__swiper-button-prev"><i class="agrikon-icon-right-arrow"></i></div>
                    </div><!-- /.team-one__nav -->

                </div><!-- /.team-one__content -->
            </div><!-- /.col-md-12 col-lg-5 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="team-one__carousel-wrap">
        <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 0, "slidesPerView": 1, "slidesPerGroup": 1, "autoplay": { "delay": 5000 }, "navigation": {
            "nextEl": "#team-one__swiper-button-next",
            "prevEl": "#team-one__swiper-button-prev"
        },"breakpoints": {
            "0": {
                "spaceBetween": 0,
                "slidesPerView": 1,
                "slidesPerGroup": 1
            },
            "640": {
                "spaceBetween": 30,
                "slidesPerView": 2,
                "slidesPerGroup": 2
            },
            "992": {
                "spaceBetween": 30,
                "slidesPerView": 3,
                "slidesPerGroup": 3
            },
            "1200": {
                "spaceBetween": 30,
                "slidesPerView": 3,
                "slidesPerGroup": 3
            }
        }}'>

            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/MOISE CEO.jpg" alt="Lusambya Lukendo Moise">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Lusambya Lukendo Moise</h3>
                        <p>Gérant </p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/Rev. LUKENDOBONGA.jpg" alt="Rev Lukendobonga Waenge Zabulon">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Rev Lukendobonga Waenge Zabulon</h3>
                        <p>Président </p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/PASTOR 1.jpg" alt="Rev Mwendanababo Mkila Elkana">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Rev Mwendanababo Mkila Elkana</h3>
                        <p>Vice-Président</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/sadiki.jpg" alt="Dr Sadiki Byombuka Onésime">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Dr Sadiki Byombuka Onésime</h3>
                        <p>Administrateur</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/zawadi.jpg" alt="Zawadi">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Zawadi</h3>
                        <p>Financière</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/SAIDI 1.jpg" alt="Saidi Alo-I-Bya Sango">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Saidi Alo-I-Bya Sango</h3>
                        <p>Professeur et Consultant en
                            Controleur</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/CHRISTELLE.jpg" alt="Christelle">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Christelle</h3>
                        <p>Agronome</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/JEAN-PAUL.jpg" alt="Ir Byaunda Ombe Jean-Paul">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Ir Byaunda Ombe Jean-Paul</h3>
                        <p>Agronome</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/DANIEL BYANGENE.jpg" alt="Ir Daniel Byangene Gédeon">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Ir Daniel Byangene Gédeon</h3>
                        <p>Agronome</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-card__image">
                            <img src="/assets/images/team/Paul.jpg" alt="Ir Ikocha Lukendo Paul">
                            <div class="team-card__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div><!-- /.team-card__social -->
                        </div><!-- /.team-card__image -->
                        <h3>Ir Ikocha Lukendo Paul</h3>
                        <p>Environnementaliste</p>
                    </div><!-- /.team-card -->
                </div><!-- /.swiper-slide -->
            </div><!-- /.swiper-wrapper -->

        </div><!-- /.thm-swiper__slider -->
    </div><!-- /.team-one__carousel-wrap -->
</section><!-- /.team-one --> */ ?>

<?php //include('partials/testimonials.php') 
?>

<?php /*
<section class="about-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-three__image">
                    <img src="/assets/images/resources/about-3-2.jpg" alt="">
                </div><!-- /.about-three__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="about-three__content">
                    <div class="block-title">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <p>Get to know us</p>
                        <h3>30 Years Agriculture
                            Experience</h3>
                    </div><!-- /.block-title -->
                    <ul class="about-three__list list-unstyled">
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Suspe ndisse suscipit sagittis
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            If you are going to a passage
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Entum estibulum dignissim
                        </li>
                        <li>
                            <i class="fa fa-check-circle"></i>
                            Entum estibulum dignissim
                        </li>
                    </ul><!-- /.about-three__list list-unstyled -->
                    <div class="about-three__summery">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed deiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Donec scelerisque dolor id nunc dictum, interdum. </p>
                    </div><!-- /.about-three__summery -->
                    <div class="about-three__signs">
                        <img src="/assets/images/resources/about-3-1.png" alt="">
                        <img src="/assets/images/resources/sign-1-1.png" alt="">
                    </div><!-- /.about-three__signs -->
                </div><!-- /.about-three__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-three -->

*/ ?>

<?php include("partials/parteners.php") ?>


<section class="d-none call-to-action jarallax" data-jarallax data-speed="0.3" data-imgPosition="-80% 50%">
    <img class="call-to-action__bg jarallax-img" src="/assets/images/backgrounds/cta-1-bg-1.jpg" alt="parallax-image" />
    <!-- /.call-to-action__bg -->
    <div class="container">
        <div class="call-to-action__content">
            <i class="call-to-action__icon agrikon-icon-agriculture-2"></i>
            <h3>We’re popular leader in agriculture
                market globally</h3>
        </div><!-- /.call-to-action__content -->
        <div class="call-to-action__button">
            <a href="services" class="thm-btn">Discover More</a><!-- /.thm-btn -->
        </div><!-- /.call-to-action__button -->
    </div><!-- /.container -->
</section><!-- /.call-to-action -->
<?php require('partials/footer.php') ?>