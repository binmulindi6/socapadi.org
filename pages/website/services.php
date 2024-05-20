<?php require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index">Acceuil</a></li>
            <li>/</li>
            <li><span>Domaines d'Interventions</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2>Nos Domaines d'Interventions</h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="service-two service-two__service-page">
    <div class="container">

        <?php include("partials/services_block.php") ?>
    </div><!-- /.container -->
</section><!-- /.service-two -->

<?php /*
<section class="feature-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="feature-one__content">
                    <div class="block-title">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <p>What we’re offering</p>
                        <h3>Better Agriculture for
                            Better Future</h3>
                    </div><!-- /.block-title -->
                    <div class="feature-one__summery">
                        <p>There are many variations of passages of lorem ipsum available but the majority have suffered
                            alteration in some form by injected humor or random word which don't look even.</p>
                    </div><!-- /.feature-one__summery -->
                    <ul class="list-unstyled feature-one__check-list">
                        <li>
                            <i class="agrikon-icon-tick"></i>
                            Get the best and fresh organic products
                        </li>
                        <li>
                            <i class="agrikon-icon-tick"></i>
                            Get the best and fresh organic products
                        </li>
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.feature-one__content -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="feature-one__image">
                    <img src="/assets/images/resources/feature-1-1.jpg" alt="">
                </div><!-- /.feature-one__image -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.feature-one -->
*/ ?>

<section class="call-to-action__two jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
    <img class="call-to-action__two__bg jarallax-img" src="/assets/images/backgrounds/cta-2-bg-1.jpg" alt="parallax-image" />
    <div class="container">
        <h3>L’agriculture compte pour l’avenir</h3>
        <!-- <a href="about" class="thm-btn">Discover More</a>/.thm-btn -->
    </div><!-- /.container -->
</section><!-- /.call-to-action__two -->

<section class="service-one service-one__about">
    <div class="container">
        <div class="block-title text-center">
            <div class="block-title__image"></div><!-- /.block-title__image -->
            <p></p>
            <h3>Ce que nous faisons Quotidienement</h3>
        </div><!-- /.block-title -->
        <?php include("partials/services-overview.php") ?>
    </div><!-- /.container -->
</section><!-- /.service-one -->

<?php include("partials/parteners.php") ?>

<? /*
<section class="call-to-action__three jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
    <img class="call-to-action__three__bg jarallax-img" src="/assets/images/backgrounds/cta-1-bg-1.jpg" alt="parallax-image" />
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="call-to-action__three-image">
                    <img src="/assets/images/resources/cta-3-1.jpg" alt="">
                    <img src="/assets/images/resources/cta-3-2.jpg" alt="">
                </div><!-- /.call-to-action__three-image -->
            </div><!-- /.col-lg-5 -->
            <div class="col-lg-7">
                <div class="call-to-action__three-content">
                    <h3>Providing High Quality
                        Products</h3>
                    <a href="about" class="thm-btn">Discover More</a><!-- /.thm-btn -->
                </div><!-- /.call-to-action__three-content -->
            </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.call-to-action__three --> 
*/ ?>
<?php require('partials/footer.php') ?>