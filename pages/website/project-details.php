<?php require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index">Acceuil</a></li>
            <li>/</li>
            <li><span>Projects</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2><?= $item->name ?></h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="project-details">
    <div class="container">
        <img src="/assets/images/<?= $item->cover ?>" class="img-fluid w-full" alt="">
        <ul class="list-unstyled project-details__list">
            <li>
                <span>Début :
                </span>
                <?= $item->debut ?>
            </li>
            <li>
                <span>Fin:
                </span>
                <?= $item->fin ?>
            </li>
            <li>
                <span>Partenaire :
                </span>
                <?= $item->partenaire ?>
            </li>
            <!-- <li>
                <span>Category:
                </span>
                Agriculture, Eco
            </li> -->
            <!-- <li>
                <span>Service:
                </span>
                Organic Products
            </li> -->
        </ul><!-- /.list-unstyled project-details__list -->
        <h3><?= $item->name ?></h3>
        <?= $item->body ?>
    </div><!-- /.container -->
</section><!-- /.project-details -->

<div class="projects-one project-page">
    <div class="container">
        <hr />
        <div class="block-title text-center">
            <div class="block-title__image"></div><!-- /.block-title__image -->
            <p>Projets Réalisés</p>
            <h3>Liste des nos dernièrs Projets Réalisés</h3>
        </div><!-- /.block-title -->
        <div class="row">
            <?php foreach ($latest as $item) : ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="projects-one__single">
                        <img src="/assets/images/<?= $item->cover ?>" alt="">
                        <div class="projects-one__content">
                            <h3><?= $item->name ?></h3>
                            <a href="project-details?id=<?= $item->id ?>" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                        </div><!-- /.projects-one__content -->
                    </div><!-- /.projects-one__single -->
                </div><!-- /.col-sm-12 -->
            <?php endforeach ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.projects-one -->

<?php require('partials/footer.php') ?>