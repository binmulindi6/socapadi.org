<?php require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="">Acceil</a></li>
            <li>/</li>
            <li><span>contact</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2>Nous Contacter</h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="contact-one">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                <div class="contact-one__content">
                    <div class="block-title">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <p>Contactez Nous Maintenant</p>
                        <h3>Laisser un Message</h3>
                    </div><!-- /.block-title -->
                    <div class="contact-one__summery">
                        <p>Pour ne rien manquer sur toutes nos actualités suivez nous sur nos Reseaux Sociaux.</p>
                    </div><!-- /.contact-one__summery -->
                    <div class="contact-one__social">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div><!-- /.contact-one__social -->
                </div><!-- /.contact-one__content -->
            </div><!-- /.col-sm-12 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                <form action="/assets/inc/sendemail.php" class="contact-one__form contact-form-validated">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" placeholder="Votre Nom">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <input type="text" name="email" placeholder="Votre Adresse Mail">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <input type="text" name="phone" placeholder="Numero de Telephone">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <input type="text" name="subject" placeholder="Object">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <textarea name="message" placeholder="Votre Message"></textarea>
                        </div><!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <button type="submit" class="thm-btn">Envoyer le Message</button><!-- /.thm-btn -->
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </form>
            </div><!-- /.col-sm-12 col-md-6 col-lg-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.contact-one -->

<section class="contact-infos">
    <div class="container">
        <div class="inner-container wow fadeInUp" data-wow-duration="1500ms">
            <div class="row no-gutters">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="contact-infos__single">
                        <h3>
                            <i class="agrikon-icon-pin pr-2"></i>
                            Notre Siege Sociale
                        </h3>
                        <p><?= $data["website"]["adresse"][1] ?></p>
                    </div><!-- /.contact-infos__single -->
                </div><!-- /.col-sm-12 col-md-12 col-lg-4 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="contact-infos__single">
                        <h3>
                            <i class="agrikon-icon-pin pr-2"></i>
                            Bureau de la coordination
                        </h3>
                        <p><?= $data["website"]["adresse"][0] ?></p>
                    </div><!-- /.contact-infos__single -->
                </div><!-- /.col-sm-12 col-md-12 col-lg-4 -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="contact-infos__single">
                        <h3>Telephone ou Email</h3>
                        <p><a href="mailto:<?= $data["website"]["phone"][0] ?>"><?= $data["website"]["email"] ?></a>
                            <br>
                            <!-- <a href="mailto:info@company.com">info@company.com</a><br> -->
                            <a href="tel:<?= $data["website"]["phone"][0] ?>"><?= $data["website"]["phone"][0] ?></a>
                            <a href="tel:<?= $data["website"]["phone"][1] ?>"><?= $data["website"]["phone"][1] ?></a>
                        </p>
                    </div><!-- /.contact-infos__single -->
                </div><!-- /.col-sm-12 col-md-12 col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</section><!-- /.contact-infos -->

<div style="overflow:hidden;max-width:100%;width:100%;height:500px;">
    <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Bukavu,+République+démocratique+du+Congo&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
        <style>
            #embed-map-display .text-marker {}

            .map-generator {
                max-width: 100%;
                max-height: 100%;
                background: none;
            }
        </style>
    </div>


    <?php require('partials/footer.php') ?>