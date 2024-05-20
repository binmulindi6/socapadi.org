<?php require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url('/assets/images/backgrounds/page-header-bg-1-1.jpg');">
    </div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index">Acceuil</a></li>
            <li>/</li>
            <li><span>Projets</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2>Nos Projects Réalisés</h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->

<div class="projects-one">
    <div class="container">
        <h1 class="p-4 text-center">Projets Réalisés</h1>
        <div class="row">
            <?php foreach ($projects as $item) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="projects-one__single">
                    <img src="/assets/images/<?= $item->cover ?>" alt="">
                    <a href="/project-details?id=<?= $item->id ?>" class="projects-one__content">
                        <h4>
                            <?= $item->name ?>
                        </h4>
                        <a href="p/roject-details?id=<?= $item->id ?>" class="projects-one__button"><i
                                class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                    </a><!-- /.projects-one__content -->
                </div><!-- /.projects-one__single -->
                <h4>
                    <a href="/project-details?id=<?= $item->id ?>">
                        <h4> <?= $item->name ?>
                        </h4>
                    </a>
                </h4>
            </div><!-- /.col-sm-12 -->
            <?php endforeach ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.projects-one -->


<?php require('partials/footer.php') ?>