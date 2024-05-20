<?php require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(/assets/images/backgrounds/page-header-bg-1-1.jpg);">
    </div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="/">Acceuil</a></li>
            <li>/</li>
            <li><span>Publications</span></li>
            <li>/</li>
            <li><span><?= $title ?></span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2><?= $blog->title ?></h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->


<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details__image">
                    <img src="/assets/images/<?= $blog->cover ?>" class="img-fluid" alt="">
                </div><!-- /.blog-details__image -->
                <div class="blog-card__content">
                    <div class="blog-card__date"><?= date_format(new DateTime($blog->created_at), 'd M') ?></div>
                    <!-- /.blog-card__date -->
                    <div class="blog-card__meta">
                        <i class="far fa-user-circle"></i> <?= " " . $blog->author ?>
                    </div><!-- /.blog-card__meta -->
                    <h3><?= $blog->title ?></h3>
                </div><!-- /.blog-card__content -->
                <div class="blog-details__content">
                    <?= $blog->body ?>
                </div><!-- /.blog-details__content -->

                <div class="blog-details__meta mb-10">
                    <div class="blog-details__tags">
                        <span>Partager:</span>
                        <!-- <a href="#">Agriculture,</a>
                        <a href="#">Food,</a>
                        <a href="#">Economy</a> -->
                    </div><!-- /.blog-details__tags -->
                    <div class="blog-details__social">
                        <a href="whatsapp://send?text=<?= $blog->description . ' https://socapadi.org/show/' . strtolower($blog->category) . 's/' . $blog->id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= 'https://socapadi.org/show/' . strtolower($blog->category) . 's/' . $blog->id . '&t=' .  $blog->description  ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="bi bi-facebook" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://twitter.com/share?url=<?= 'https://socapadi.org/show/' . strtolower($blog->category) . 's/' . $blog->id . '&via=mudecapital&text=' .  $blog->description  ?>" target="_blank">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                            </svg>
                        </a>
                    </div><!-- /.blog-details__social -->
                </div><!-- /.blog-details__meta -->

                <?php /*<div class="blog-author">
                    <div class="blog-author__image">
                        <img src="/assets/images/blog/blog-author-1-1.jpg" alt="">
                    </div><!-- /.blog-author__image -->
                    <div class="blog-author__content">
                        <h3>Kevin Martin</h3>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining unchanged. It was popularised in the sheets containing.</p>
                    </div><!-- /.blog-author__content -->
                </div><!-- /.blog-author -->*/ ?>

                <?php /* <div class="blog-comment">
                    <h2>2 Comments</h2>
                    <div class="blog-comment__box">
                        <div class="blog-comment__image">
                            <img src="/assets/images/blog/comment-1-1.jpg" alt="">
                        </div><!-- /.blog-comment__image -->
                        <div class="blog-comment__content">
                            <h3>Jessica Brown</h3>
                            <p>It has survived not only five centuries, but also the leap into electronic typesetting
                                unchanged. It was popularised in the sheets If you are going to use a passage of Lorem
                                Ipsum, you need to be is simply free text.</p>
                            <a href="#" class="thm-btn">Reply</a><!-- /.thm-btn -->
                        </div><!-- /.blog-comment__content -->
                    </div><!-- /.blog-comment__box -->
                    <div class="blog-comment__box">
                        <div class="blog-comment__image">
                            <img src="/assets/images/blog/comment-1-2.jpg" alt="">
                        </div><!-- /.blog-comment__image -->
                        <div class="blog-comment__content">
                            <h3>Jessica Brown</h3>
                            <p>It has survived not only five centuries, but also the leap into electronic typesetting
                                unchanged. It was popularised in the sheets If you are going to use a passage of Lorem
                                Ipsum, you need to be is simply free text.</p>
                            <a href="#" class="thm-btn">Reply</a><!-- /.thm-btn -->
                        </div><!-- /.blog-comment__content -->
                    </div><!-- /.blog-comment__box -->
                </div><!-- /.blog-comment -->
                <div class="comment-form">
                    <h2>Leave a Comments</h2>

                    <form action="/assets/inc/sendemail.php" class="contact-one__form contact-form-validated">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Full Name">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <input type="text" name="email" placeholder="Email Address">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <input type="text" name="phone" placeholder="Phone Number">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <input type="text" name="subject" placeholder="Subject">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Write Message"></textarea>
                            </div><!-- /.col-lg-12 -->
                            <div class="col-lg-12">
                                <button type="submit" class="thm-btn">Submit Comment</button><!-- /.thm-btn -->
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </form>
                </div><!-- /.comment-form -->*/ ?>
            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- <div class="blog-sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="agrikon-icon-magnifying-glass"></i></button>
                        </form>
                    </div> -->
                    <div class="blog-sidebar__posts mb-10">
                        <h3>Recentes Publications</h3>
                        <ul>
                            <?php foreach ($latest as $last) : ?>
                                <li>
                                    <img style="height: 80px; width:80px;" src="/assets/images/<?= $last->cover ?>" alt="">
                                    <span><i class="far fa-comments"></i> <?= $last->category ?>
                                    </span>
                                    <h4><a href='<?= "/show/" . strtolower($last->category) . "s/" . $last->id ?>'><?= $last->title ?></a>
                                    </h4>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </div><!-- /.blog-sidebar__posts -->
                    <div class="blog-sidebar__categories">
                        <h3>Catégories</h3>
                        <ul>
                            <li>
                                <a href="/articles"><i class="agrikon-icon-right-arrow"></i>Articles
                                </a>
                            </li>
                            <li>
                                <a href="/rapports"><i class="agrikon-icon-right-arrow"></i>

                                    Rapports</a>
                            </li>

                            <li>
                                <a href="/actualites"><i class="agrikon-icon-right-arrow"></i>Actualités</a>
                            </li>

                            <li>
                                <a href="/autres"><i class="agrikon-icon-right-arrow"></i>Autres</a>
                            </li>
                        </ul>
                    </div><!-- /.blog-sidebar__categories -->

                </div><!-- /.blog-sidebar -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-details -->


<?php require('partials/footer.php') ?>