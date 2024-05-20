<?php include('partials/head.php') ?>
<?php

// $desc = "Concilier le développement agricole, la sécurité alimentaire et la préservation de l’environnement, tout en renforçant la résilience des communautés agricoles et pastorales.";


?>
<section class="main-slider">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{
                                                                                    "slidesPerView": 1,
                                                                                    "loop": true,
                                                                                    "effect": "fade",
                                                                                    "autoplay": {
                                                                                        "delay": 10000
                                                                                    },
                                                                                    "navigation": {
                                                                                        "nextEl": "#main-slider__swiper-button-next",
                                                                                        "prevEl": "#main-slider__swiper-button-prev"
                                                                                    }
                                                                                }'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/main-slider/main-slider-1-1.jpg);">
                </div>
                <!-- /.image-layer -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <span class="tagline">Bienvenue à <?= $data["website"]["full_name"] ?></span>
                            <h2><span>Agriculture</span> <br>
                                & Elevage</h2>
                            <p><?= $data["website"]["banner_slogan"] ?></p>
                            <a href="#discover" class=" thm-btn">Decouvrir Plus</a>
                            <!-- /.thm-btn dynamic-radius -->
                        </div><!-- /.col-lg-7 text-right -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.swiper-slide -->
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/main-slider/main-slider-1-2.jpg);">
                </div>
                <!-- /.image-layer -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <span class="tagline">Bienvenue à la <?= $data["website"]["full_name"] ?></span>
                            <h2><span>Agriculture</span> <br>
                                & Elevage</h2>
                            <p><?= $data["website"]["banner_slogan"] ?></p>
                            <a href="#discover" class=" thm-btn">Decouvrir Plus</a>
                            <!-- /.thm-btn dynamic-radius -->
                        </div><!-- /.col-lg-7 text-right -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.swiper-slide -->
        </div><!-- /.swiper-wrapper -->

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i class="agrikon-icon-left-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="agrikon-icon-right-arrow"></i></div>
        </div><!-- /.main-slider__nav -->

    </div><!-- /.swiper-container thm-swiper__slider -->
</section><!-- /.main-slider -->

<section id="discover" class="service-one">
    <?php include('partials/services-overview.php') ?>
</section><!-- /.service-one -->

<section class="about-one">
    <img src="/assets/images/icons/about-bg-icon-1-1.png" class="about-one__bg-shape-1" alt="">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="about-one__images">
                    <img src="/assets/images/resources/about-1-1.jpg" alt="">
                    <!-- <img src="/assets/images/resources/about-1-2.jpg" alt=""> -->
                    <div class="about-one__count wow fadeInLeft" data-wow-duration="1500ms">
                        <span>Approuvé par</span>
                        <h4>+200</h4>
                    </div><!-- /.about-one__count -->
                </div><!-- /.about-one__images -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-7">
                <div class="about-one__content">
                    <div class="block-title text-left">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <!-- <p></p> -->
                        <h3>Une Bonne Agriculture pour un meilleur avenir</h3>
                    </div><!-- /.block-title -->
                    <div class="about-one__tagline">
                        <p>Nous avons 14 ans d'expérience dans l'agro-patorale et l'éco-agriculture à l'échelle
                            mondiale.</p>
                    </div><!-- /.about-one__tagline -->
                    <div class="about-one__summery">
                        <p>Nous aspirons à un avenir où les pratiques agricoles et pastorales contribuent à la
                            préservation des écosystèmes tout en améliorant les moyens de subsistance des membres de la
                            coopérative.</p>
                    </div><!-- /.about-one__summery -->
                    <div class="about-one__icon-row">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about-one__box">
                                    <i class="agrikon-icon-farmer"></i>
                                    <h4><a href="about">Agriculteurs
                                            Professionnels</a></h4>
                                </div><!-- /.about-one__box -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="about-one__box">
                                    <i class="agrikon-icon-agriculture"></i>
                                    <h4><a href="services">Solutions Ecologiques</a></h4>
                                </div><!-- /.about-one__box -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.about-one__icon-row -->
                    <a href="about" class="thm-btn">En Savoir Plus</a><!-- /.thm-btn -->
                </div><!-- /.about-one__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-one -->

<section class="service-two">
    <div class="service-two__bottom-curv"></div><!-- /.service-two__bottom-curv -->
    <div class="container">
        <div class="block-title text-center">
            <div class="block-title__image"></div><!-- /.block-title__image -->
            <p>Domaines d'Intervention</p>
            <h3>Nous Intervenons dans : </h3>
        </div><!-- /.block-title -->
        <?php include("partials/services_block.php") ?>
    </div><!-- /.container -->
</section><!-- /.service-two -->

<div class="projects-one project-one__home-one">
    <div class="container">
        <div class="block-title text-center">
            <div class="block-title__image"></div><!-- /.block-title__image -->
            <p>Projets </p>
            <h3>Projets Recemment Réalisés</h3>
        </div><!-- /.block-title -->
        <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 0, "slidesPerView": 1, "loop": true, "slidesPerGroup": 1, "pagination": {
            "el": "#projects-one__swiper-pagination",
            "type": "bullets",
            "clickable": true
        },
        "breakpoints": {
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
                "slidesPerView": 2,
                "slidesPerGroup": 2
            }
        }}'>
            <div class="swiper-wrapper">
                <?php foreach ($data["website"]["projets_realises"] as $item) : ?>
                    <div class="swiper-slide">
                        <div class="projects-one__single">
                            <img src="<?= $item["cover"] ?>" alt="">
                            <div class="projects-one__content">
                                <h3>
                                    <?= $item["name"] ?>
                                </h3>
                                <a href="project-details?id=<?= $item['id'] ?>" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                            </div><!-- /.projects-one__content -->
                        </div><!-- /.projects-one__single -->
                    </div><!-- /.swiper-slide -->
                <?php endforeach ?>
            </div><!-- /.swiper-wrapper -->
            <div class="swiper-pagination" id="projects-one__swiper-pagination"></div>
        </div><!-- /.swiper-container -->
    </div><!-- /.container -->
</div><!-- /.projects-one -->

<section class="call-to-action__three jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
    <img class="call-to-action__three__bg jarallax-img" src="/assets/images/backgrounds/cta-1-bg-1.jpg" alt="parallax-image" />
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wow fadeInLeft" data-wow-duration="1500ms">
                <div class="call-to-action__three-image">
                    <img src="/assets/images/resources/cta-3-1.jpg" alt="">
                    <img style="height:300px; margin-left:20px;" src="/assets/images/resources/cta-3-2.jpg" alt="">
                </div><!-- /.call-to-action__three-image -->
            </div><!-- /.col-lg-5 -->
            <div class="col-lg-7">
                <div class="call-to-action__three-content">
                    <h3>Renforcer la résilience des communautés face au changement climatique</h3>
                    <a href="about" class="thm-btn">En Savoir Plus</a><!-- /.thm-btn -->
                </div><!-- /.call-to-action__three-content -->
            </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.call-to-action__three -->

<?php /*<section class="testimonials-one">
    <img src="/assets/images/icons/testimonials-bg-1-1.png" class="testimonials-one__bg" alt="">
    <div class="container">
        <h2 class="testimonials-one__title">Temoignages</h2>
        <div id="testimonials-one__carousel" class="testimonials-one__carousel swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonials-one__icons">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div><!-- /.testimonials-one__icons -->
                    <p>This is due to their excellent service, competitive pricing and customer support. It’s
                        throughly
                        refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure
                        dolor in
                        reprehenderit in esse nulla pariatur.</p>
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="testimonials-one__icons">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div><!-- /.testimonials-one__icons -->
                    <p>This is due to their excellent service, competitive pricing and customer support. It’s
                        throughly
                        refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure
                        dolor in
                        reprehenderit in esse nulla pariatur.</p>
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="testimonials-one__icons">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div><!-- /.testimonials-one__icons -->
                    <p>This is due to their excellent service, competitive pricing and customer support. It’s
                        throughly
                        refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure
                        dolor in
                        reprehenderit in esse nulla pariatur.</p>
                </div><!-- /.swiper-slide -->
            </div><!-- /.swiper-wrapper -->
        </div><!-- /#testimonials-one__carousel -->

        <div id="testimonials-one__thumb" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonials-one__image">
                        <img src="/assets/images/resources/testimonials-1-1.jpg" alt="">
                    </div><!-- /.testimonials-one__image -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="testimonials-one__image">
                        <img src="/assets/images/resources/testimonials-1-2.jpg" alt="">
                    </div><!-- /.testimonials-one__image -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="testimonials-one__image">
                        <img src="/assets/images/resources/testimonials-1-3.jpg" alt="">
                    </div><!-- /.testimonials-one__image -->
                </div><!-- /.swiper-slide -->
            </div><!-- /.swiper-wrapper -->
        </div><!-- /#testimonials-one__thumb.swiper-container -->

        <div id="testimonials-one__meta" class="testimonials-one__carousel swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonials-one__meta">
                        <h4>Jessica Brown</h4>
                        <span>Customer</span>
                    </div><!-- /.testimonials-one__meta -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="testimonials-one__meta">
                        <h4>Caleb Hoffman</h4>
                        <span>Customer</span>
                    </div><!-- /.testimonials-one__meta -->
                </div><!-- /.swiper-slide -->
                <div class="swiper-slide">
                    <div class="testimonials-one__meta">
                        <h4>Bradley Kim</h4>
                        <span>Customer</span>
                    </div><!-- /.testimonials-one__meta -->
                </div><!-- /.swiper-slide -->
            </div><!-- /.swiper-wrapper -->
        </div><!-- /#testimonials-one__meta.swiper-container -->
        <div class="swiper-pagination" id="testimonials-one__swiper-pagination"></div>
    </div><!-- /.container -->
</section><!-- /.testimonials-one --> */ ?>

<?php include("partials/latest_blogs.php") ?>

<section class="contact-two">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                <div class="contact-two__image">
                    <div class="contact-two__image-bubble-1"></div><!-- /.contact-two__image-bubble-1 -->
                    <div class="contact-two__image-bubble-2"></div><!-- /.contact-two__image-bubble-2 -->
                    <div class="contact-two__image-bubble-3"></div><!-- /.contact-two__image-bubble-3 -->
                    <img src="/assets/images/resources/contact-1-1.jpg" class="img-fluid" alt="">
                </div><!-- /.contact-two__image -->
            </div><!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-5 -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                <div class="contact-two__content">
                    <div class="block-title">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <p>Contactez Nous</p>
                        <h3>Laissez nous un Message</h3>
                    </div><!-- /.block-title -->
                    <div class="contact-two__summery">
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor
                            incididunt
                            ut labore et dolore magna aliqua lonm andhn. Aenean tincidunt id mauris id auctor.
                            Donec at
                            ligula lacus dignissim mi quis simply neque.</p> -->
                    </div><!-- /.contact-two__summery -->
                </div><!-- /.contact-two__content -->
            </div><!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-4 -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                <form action="/assets/inc/sendemail.php" class="contact-one__form contact-form-validated">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="name" placeholder="Votre Nom">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <input type="text" name="email" placeholder="Adresse Mail ">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <input type="text" name="phone" placeholder="Numero de Telephone">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <textarea name="message" placeholder="Votre Message"></textarea>
                        </div><!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <button type="submit" class="thm-btn">Envoyer le Message</button><!-- /.thm-btn -->
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </form>
            </div><!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.contact-two -->



<?php include("partials/parteners.php") ?>

<?php require('partials/footer.php') ?>